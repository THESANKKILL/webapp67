const randomhexcolorcode = ()=>{
    let n = (Math.random() * 0xffffff * 1000000).toString(16);
    return '#' + n.slice(0, 6);
}
const randomhexcolorcode2 =()=>'#'+(Math.random()*0xffffff * 1000000).toString(16).slice(0, 6);
console.log(randomhexcolorcode ());