<!DOCTYPE html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>

    {{-- CSS files --}}
    @vite('resources/css/app.css')

    {{-- External libraries CDN --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

</head>
<body>

    <main class="
        flex flex-col
        items-center justify-center
        m-auto py-2 gap-2
        w-8/12
    ">

        <div class="
            flex flex-col
            shadow shadow-gray-700
            border border-gray-400
            p-2 gap-2
            w-full h-full
        " id="chat">
        </div>
    
        <div class="w-full">
            <form id="chat-form">
                <div class="
                    flex flex-row
                    items-center justify-center
                    shadow shadow-gray-700
                    border border-gray-400 rounded-lg
                    p-2 gap-2
                ">
                    <input type="text" name="message" id="message" class="
                        border-none outline-none
                        w-full
                    ">
                    <button type="submit" class="
                        flex
                        items-center justify-center
                        text-gray-700
                        hover:text-black
                    ">
                        <ion-icon name="send-outline"></ion-icon>
                    </button>
                </div>
            </form>
        </div>

    </main>

    <aside class="
        fixed top-0 left-0
        flex flex-col
        items-center justify-center
        w-full h-full
    " id="user-id-modal">
        <div class="
            absolute
            w-full h-full
            bg-black
            opacity-85
        ">
        </div>

        <form class="z-10" id="user-id-form">
            <div class="
                flex flex-col
                shadow shadow-gray-900
                border border-gray-600 rounded-lg
                p-2 gap-2
                bg-white
            ">
                <input type="text" name="user_id" id="user-id" class="
                    shadow shadow-gray-900
                    border border-gray-600 outline-none
                    p-1
                    w-full
                    text-center
                ">
                <button type="submit" class="
                    shadow shadow-gray-900
                    border border-gray-600
                    p-1
                    w-full
                    hover:bg-black
                    hover:text-white
                    hover:border-black
                ">
                    <ion-icon name="arrow-forward-outline"></ion-icon>
                </button>
            </div>
        </form>
    </aside>

    <aside class="
        fixed top-0
        hidden
        w-full
    " id="error-modal">
        <div class="
            bg-red-700
            text-white text-center
            p-4 m-auto
            w-8/12
        ">
            <p id="error-message"></p>
        </div>
    </aside>

    {{-- Scripts files --}}
    @vite('resources/js/app.js')
    <script>
        const userIdForm = document.getElementById('user-id-form');
        const userIdModal = document.getElementById('user-id-modal');
        const userIdInput = document.getElementById('user-id');
        const errorModal = document.getElementById('error-modal');
        const errorMessage = document.getElementById('error-message');

        userIdForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            if (Number.isNaN(Number.parseInt(userIdInput.value))) {
                errorModal.style.display = 'block';
                errorMessage.innerHTML = 'O valor de user_id precisa ser numerico';
                
                setTimeout(() => {
                    errorMessage.innerHTML = '';
                    errorModal.style.display = 'none';
                }, 5000);

                return;
            }
            
            userIdModal.style.display = 'none';
        });
    </script>

</body>
</html>