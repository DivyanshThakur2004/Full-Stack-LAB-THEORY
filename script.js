let numb = 5;
function factorial(n){
    if(n==1){
        return 1;
    }
    n=n*factorial(n-1);
    return n;
}
let ans = factorial(numb);
console.log(ans);