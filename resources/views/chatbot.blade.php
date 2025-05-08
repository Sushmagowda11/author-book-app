@extends('layouts.app')

@section('title', 'Chatbot')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title mb-4 text-success"><i class="fas fa-robot"></i> Ask the Chatbot</h3>

            <form id="chat-form">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" id="user_query" class="form-control form-control-lg" placeholder="Type your question..." required>
                    <button class="btn btn-success btn-lg" type="submit">
                        <i class="fas fa-paper-plane"></i> Ask
                    </button>
                </div>
            </form>

            <!-- Chat History -->
            <div id="chat-history" class="mt-4 d-flex flex-column gap-3">
                <!-- All chat messages will be appended here -->
            </div>
        </div>
    </div>
</div>

<!-- Stylish Chat Bubble CSS -->
<style>
    .bubble {
        padding: 12px 16px;
        border-radius: 18px;
        display: inline-block;
        max-width: 100%;
        word-wrap: break-word;
        font-size: 16px;
        line-height: 1.5;
    }

    .user {
        background-color: #e9f5ff;
        color: #000;
        border: 1px solid #cce5ff;
        align-self: flex-end;
    }

    .bot {
        background-color: #e8f5e9;
        color: #1b5e20;
        border: 1px solid #c8e6c9;
        align-self: flex-start;
    }

    .user-msg, .bot-msg {
        display: flex;
        flex-direction: column;
    }

    .bot i {
        margin-right: 6px;
    }

    #chat-history {
        border-top: 1px solid #ccc;
        padding-top: 1rem;
    }
</style>
@endsection

@push('scripts')
<script>
document.getElementById('chat-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const queryInput = document.getElementById('user_query');
    const chatHistory = document.getElementById('chat-history');

    const query = queryInput.value.trim();
    if (!query) {
        alert('Please enter a question!');
        return;
    }

    // Create user message element
    const userMsg = document.createElement('div');
    userMsg.classList.add('user-msg');
    userMsg.innerHTML = `<div class="bubble user">You: ${query}</div>`;
    chatHistory.appendChild(userMsg);

    // Create bot placeholder message
    const botMsg = document.createElement('div');
    botMsg.classList.add('bot-msg');
    const botBubble = document.createElement('div');
    botBubble.classList.add('bubble', 'bot');
    botBubble.innerHTML = `<i class="fas fa-robot"></i> <strong>Answer:</strong> <span>...</span>`;
    botMsg.appendChild(botBubble);
    chatHistory.appendChild(botMsg);

    queryInput.disabled = true;

    fetch("{{ route('chatbot.ask') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ query })
    })
    .then(res => res.json())
    .then(data => {
        const answer = data.answer || "No response received.";
        let formatted = '';

        if (answer.includes(':')) {
            const parts = answer.split(':');
            const intro = parts[0].trim() + ': <br><br>';
            formatted += `<strong>${intro}</strong>`;

            // Get list after the first colon and first comma
            const remaining = parts.slice(1).join(':').split(',');
            if (remaining.length > 1) {
                remaining.forEach((item, index) => {
                    formatted += `${index + 1}. ${item.trim()}<br>`;
                });
            } else {
                formatted += remaining[0].trim();
            }
        } else {
            formatted = answer;
        }

        // Update bot message with Answer icon and the formatted content
        botBubble.innerHTML = `
            <div>
                <i class="fas fa-robot"></i> <strong>Answer:</strong>
            </div>
            <div class="mt-2">${formatted}</div>
        `;

        queryInput.disabled = false;
        queryInput.value = "";
        queryInput.focus();
    })
    .catch(error => {
        console.error('Fetch error:', error);
        botBubble.innerHTML = "<i class='fas fa-robot'></i> <strong>Answer:</strong> An error occurred. Please try again.";
        queryInput.disabled = false;
    });
});
</script>
@endpush
