
    </section>
    <script>
      function allMatchesShow() {
   var element = document.getElementById("allMatches");
   element.classList.toggle("display");
}

     function sidebar() {
   var element = document.getElementById("sidebar");
   element.classList.toggle("transform");
}
      function allMatchesShow2() {
   var element = document.getElementById("allMatches2");
   element.classList.toggle("display");
}
    </script>
 <script>
var x = 0;
function prev() {
x = x - 100;
var boxes = document.getElementById('boxes');
if(x < boxes.offsetWidth){
boxes.style.transform = 'translate(-'+x+'px)';
}
if(x < 1){
boxes.style.transform = 'translate(30px)';
x = 30;
}
console.log(x)
}
function next() {
x+=100;
var menu = document.getElementById('menu').offsetWidth;
var boxes = document.getElementById('boxes');
if(x < boxes.offsetWidth - menu){
boxes.style.transform = 'translate(-'+x+'px)';
}else{
boxes.style.transform = 'translate(-'+x+'px)';
x=boxes.offsetWidth - menu;
}
console.log(x)



}



            </script>
</body>
</html>