$(document).ready(()=>{

    $('.Vmenu li').on('click', (e)=>{
        let className = e.currentTarget.id;
        console.log(className);
    });

});
