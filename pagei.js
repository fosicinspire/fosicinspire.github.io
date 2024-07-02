const slider = document.querySelectorAll(".slide");
const radiobtn = document.querySelectorAll(".radiobutton");

counter = 0;
index = counter;
radiobtn[index].style.backgroundColor = "red";

slider.forEach(
    (slide, index) => {
        slide.style.left = `${index * 100}%`
        indexa = index;
    }
);
const gonext = () => {
    if(counter < indexa) {
        counter++;
        switcher();
        radiobtn[counter].style.backgroundColor = "red";
        radiobtn[counter-1].style.backgroundColor = "transparent";
    }
}
const goprev = () => {
   if(counter >= 1 ) {
    counter--;
    switcher();
    radiobtn[counter].style.backgroundColor = "red";
    radiobtn[counter+1].style.backgroundColor = "transparent";
   }
   }

const switcher = () => {
    slider.forEach( (value) => {
        value.style.transform = `translateX(-${counter * 100}%)`;
    }       
    )
}