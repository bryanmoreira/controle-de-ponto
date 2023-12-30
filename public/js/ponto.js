document.addEventListener('DOMContentLoaded', function() {
    var pontoButton = document.getElementById('pontoButton');
    var message = document.querySelector('.message');
    var userInfo = document.getElementById('userInfo');
    var secondClickTime = document.getElementById('secondClickTime');

    pontoButton.addEventListener('click', function() {
        var now = new Date();
        var time = now.toLocaleTimeString();
        
        if (!this.classList.contains('active') && !this.classList.contains('completed')) {
            this.classList.add('active');
            userInfo.innerHTML = ` | ${time}`;
        } else if (this.classList.contains('active') && !this.classList.contains('completed')) {
            this.classList.remove('active');
            this.classList.add('completed');
            message.style.display = 'block';
            secondClickTime.innerHTML = `Saída: ${time}`;
        }
    });
});