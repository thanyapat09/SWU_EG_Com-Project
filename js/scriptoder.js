let list = document.querySelectorAll('.disGrid_wrap .disGrid_item');
list.forEach(disGrid_item => {
    disGrid_item.addEventListener('click', function(event){
        if(event.target.classList.contains('add')){
            var disGrid_itemNew = disGrid_item.cloneNode(true);
            let checkIsset  = false;

            let listCart = document.querySelectorAll('.cart .disGrid_item');
            listCart.forEach(cart =>{
                if(cart.getAttribute('data-key') == disGrid_itemNew.getAttribute('data-key')){
                    checkIsset = true;
                    cart.classList.add('danger');
                    setTimeout(function(){
                        cart.classList.remove('danger');
                    },1000)
                }
            })
            if(checkIsset == false){
                document.querySelector('.listCart').appendChild(disGrid_itemNew);
            }

        }
    })
})
function Remove($key){
    let listCart = document.querySelectorAll('.cart .disGrid_item');
    listCart.forEach(disGrid_item => {
        if(disGrid_item.getAttribute('data-key') == $key){
            disGrid_item.remove();
            return;
        }
    })
}