document.addEventListener("DOMContentLoaded",function(){
    const forms = document.querySelectorAll('form');

    forms.forEach(form =>{
        form.addEventListener('submit',function(e){
            if(!this.checkValidity()){
                return;
            }
            const btn = this.querySelector('button[type="submit"]');
            if(btn){
                btn.style.width=btn.offsetWidth + 'px';

                btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';

                btn.classList.add('disabled');
                btn.style.pointerEvents = 'none';
            }
        })
    })
})