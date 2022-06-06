function review() {
    const img = document.querySelectorAll(".image"),
    reviewProduct = document.querySelector(".review-product"),
    changeImg = reviewProduct.querySelector("img"),
    close = reviewProduct.querySelector(".icon"),
    currentImg = reviewProduct.querySelector(".current-img"),
    totalImg = reviewProduct.querySelector(".total-img"),
    popup = document.querySelector(".popup");
    window.onload = ()=> {
        console.log(img)
        for(let i =0 ;i< img.length;i++) {
            totalImg.textContent = img.length;
            let newI = i;
            let clickI ;
            img[i].onclick = ()=> {
                clickI = newI;
                console.log(i);
                function reviewimg() {
                    currentImg.textContent = newI + 1;
                    let imgUrl = img[newI].querySelector("img").src;
                    changeImg.src = imgUrl;
                    console.log(imgUrl);
    
                }
                reviewProduct.classList.add("display");
    
                const prevBtn = document.querySelector(".prev");
                const nextBtn = document.querySelector(".next");
                if(newI == 0 ) {
                    prevBtn.style.display = "none";
                }
                if(newI >= img.length -1) {
                    nextBtn.style.display = "none";
                }
                prevBtn.onclick =() =>{
                    newI--;
                    if(newI == 0 ) {
                        reviewimg();
                        prevBtn.style.display = "none";
                    }
                    else {
                        reviewimg();
                        nextBtn.style.display = "block";
                    }
    
                }
    
                nextBtn.onclick = () => {
                    newI++;
                    if(newI >= img.length -1) {
                        reviewimg();
                        nextBtn.style.display = "none";
                        
                    }
                    else {
                        reviewimg();
                        prevBtn.style.display = "block";
                    }
                }
                reviewimg();
                popup.style.display = "block";
                close.onclick = () => {
                    newI = clickI;
                    prevBtn.style.display = "block";
                    nextBtn.style.display = "block";
                    reviewProduct.classList.remove("display");
                    popup.style.display = "none";
                }
            }
    
    
        }
    
    
        
    }

}
review();