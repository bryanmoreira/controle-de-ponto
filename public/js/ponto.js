document.addEventListener("DOMContentLoaded", function () {
    var pontoButton = document.getElementById("pontoButton");
    var message = document.querySelector(".message");
    var userInfo = document.getElementById("userInfo");
    var secondClickTime = document.getElementById("secondClickTime");
    var thirdClickTime = document.getElementById("thirdClickTime");
    var fourthClickTime = document.getElementById("fourthClickTime");
    pontoButton.addEventListener("click", function () {
      var now = new Date();
      var time = now.toLocaleTimeString();
    
      // inicio expediente
      if (
        !this.classList.contains("active") &&
        !this.classList.contains("first") &&
        !this.classList.contains("completed") &&
        !this.classList.contains("almoco")
      ) {
        this.classList.add("first");
          this.innerHTML = `Iniciar Almoço`;
        userInfo.innerHTML = `Entrada: ${time}<span class="check-icon"><i class="fas fa-check"></i></span>`;
      } 
      
      
      // inicio almoço
      else if (
        !this.classList.contains("active") &&
        this.classList.contains("first") &&
        !this.classList.contains("completed") &&
        !this.classList.contains("almoco")
      ) {
        this.classList.add("almoco");
          this.innerHTML = `Finalizar Almoço`;
        secondClickTime.innerHTML = `Início Almoço: ${time}<span class="check-icon"><i class="fas fa-check"></i></span>`;
      } 
     
      // fim almoço
      else if (
        !this.classList.contains("active") &&
        this.classList.contains("first") &&
        this.classList.contains("almoco") &&
        !this.classList.contains("completed")
      ) {
          this.classList.add("active");
        this.innerHTML = `Finalizar Expediente`;
        thirdClickTime.innerHTML = `Fim Almoço: ${time}<span class="check-icon"><i class="fas fa-check"></i></span>`;
        
      }
      
     // fim expediente
      else if (
        this.classList.contains("first") &&
        this.classList.contains("almoco") &&
        this.classList.contains("active") &&
        !this.classList.contains("completed")
      ) {
        this.innerHTML = `Expediente registrado com sucesso.`;
        this.classList.add("completed");
        this.classList.remove("active");
        this.classList.remove("almoco");
        this.classList.remove("first");
        message.style.display = "block";
        fourthClickTime.innerHTML = `Saída: ${time}<span class="check-icon"><i class="fas fa-check"></i></span>`;
      }
    });
  });
  