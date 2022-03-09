let createdTime;
let clickedTime;
let reactionTime;

//圖形隨機顏色
function getRandomColor(){
    let max = 200;
    let min = 50;
    let green = Math.floor(Math.random() * (max - min + 1)) + min;
    let color = "rgba(173, " + green + ", 218 , 0.7)";
    return color;
}

//滑鼠點按圖案會消失
document.getElementById('box').onclick = function(){
    this.style.display = 'none';
}

//圖案消失隨機時間出現 
function makeBox(){
    let time = Math.random();
    time = time * 2000;
    //圖形改變
    setTimeout(function(){
        if (Math.random() >= 0.5) {
            document.getElementById('box').style.borderRadius = "50%";
        } else {
            document.getElementById('box').style.borderRadius = "0px";
        }

        // (計算頁面大小,方法1)
        // console.log(window.innerWidth);
        // console.log(window.innerHeight);
        //(計算頁面大小,方法2)
        // console.log(document.documentElement.clientWidth);
        // console.log(document.documentElement.clientHeight);

        //圖形隨機位置
        let min = 0;
        let max = window.innerHeight - 280; //為了不讓圖形跑出頁框外-280
        let top = Math.floor(Math.random() * (max - min + 1)) + min;
        min = 0;
        max = window.innerWidth - 140;
        //設定判斷瀏覽器長寬比例修改變量
        let dynamicBound;
        if (window.innerWidth > window.innerHeight) {
            dynamicBound = window.innerWidth / 8;  
            // console.log("Width:" + dynamicBound);          
        } else {
            dynamicBound = window.innerHeight / 8;
            // console.log("Height:" + dynamicBound);  
        }
        dynamicBound = dynamicBound + "px";
        document.documentElement.style.setProperty("--bound", dynamicBound);
        let left = Math.floor(Math.random() * (max - min + 1)) + min;
        document.getElementById('box').style.top = top + "px";
        document.getElementById('box').style.left = left + "px";

        //圖形隨機顏色
        document.getElementById('box').style.backgroundColor = getRandomColor();
        document.getElementById('box').style.display = "block";
        createdTime = Date.now();
    }, time);
}

//圖形隨機時間出現
document.getElementById('box').onclick = function(){
    this.style.display = "none";
    clickedTime = Date.now();
    reactionTime = (clickedTime - createdTime) / 1000;
    document.getElementById('time').innerHTML = reactionTime;
makeBox();
}
makeBox();