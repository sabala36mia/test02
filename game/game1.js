let x = 4;
console.log(Math.pow(2, 3)); //次方
console.log(Math.sqrt(64)); //開根號
console.log(Math.floor(-1.9)); //取整數(不適用於負數)
console.log(Math.ceil(-4.4)); //無條件進位(負數適用)
console.log(Math.trunc(-4.8)); //無條件捨去
console.log(Math.random()); //亂數
console.log(Math.abs(-10)); //絕對值(正數)


document.getElementById("myButton").onclick = function(){
    let x = Math.random();
    x = x * 4;
    x = Math.floor(x);
    if (x == document.getElementById('myInput').value) {
        alert("恭喜！你猜對了！！！");
    }else{
        alert("可惜~你猜錯了！這個數字是" + x);
    }
};