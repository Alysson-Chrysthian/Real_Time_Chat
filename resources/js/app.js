import axios from 'axios';
import './bootstrap';

const chatForm = document.getElementById('chat-form');
const messageInput = document.getElementById('message');
const userIdInput = document.getElementById('user-id');
const chatContainer = document.getElementById('chat');

chatForm.addEventListener('submit', (e) => {
    e.preventDefault();

    axios.post('/send', {
        message: messageInput.value,
        user_id: userIdInput.value,
    });

    messageInput.value = '';
});

Echo.channel('send.message')
    .listen('SendMessage', (e) => {

        const messageContainer = document.createElement('div');
        const messageContent = document.createElement('p');
        const messageDate = document.createElement('p');
        const date = new Date();
    
        messageContent.innerText = e.message;
        messageDate.innerText = `${date.getDate()}/${date.getMonth()+1}/${date.getFullYear()}`;
    
        messageContainer.classList.add(...[
            'flex', 'flex-col',
            'shadow', 'shadow-gray-700',
            'border', 'border-gray-400',
            'p-2',
            'w-11/12'
        ]);
        messageDate.classList.add(...[
            'self-end'
        ]);
    
        if (e.user_id != userIdInput.value) {
            messageContainer.classList.add('self-end')
        }
    
        messageContainer.append(...[
            messageContent,
            messageDate,
        ]);
    
        chatContainer.append(messageContainer);

    });

