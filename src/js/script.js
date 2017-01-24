
const init = () => {
  NodeList.prototype.forEach = Array.prototype.forEach;

  const pagetitle = document.querySelector(`.page__title__text`);
  if (pagetitle.innerHTML === `Programma`) {
    document.querySelector(`.dropdown-arrow`).addEventListener(`click`, dropdownHandler);
  } else {
    getDatetimeSubstings();
  }

};

const dropdownHandler = e => {
  const dropdown = e.currentTarget;
  console.log(e.currentTarget);
  const zones = document.querySelector(`.zones`);
  if (zones.style.visibility === `visible`) {
    zones.style.visibility = `hidden`;
    zones.style.transform = `translateY(-60.2rem)`;
    dropdown.style.transform = `translateY(-57rem) rotate(0deg)`;
  } else {
    zones.style.visibility = `visible`;
    zones.style.transform = `translateY(0)`;
    dropdown.style.transform = `rotate(-180deg) translateY(0)`;
  }

};

const getDatetimeSubstings = () => {
  const startDates = document.querySelectorAll(`.event__start`),
    startTimes = document.querySelectorAll(`.event__starttime`),
    endTimes = document.querySelectorAll(`.event__endtime`);
  console.log(startDates);

  for (let i = 0;i < startDates.length;i ++) {
    console.log();
    startDates[i].innerHTML = `${startDates[i].innerHTML.substring(10, 8)}/${startDates[i].innerHTML.substring(7, 5)}`;
    startTimes[i].innerHTML = `${startTimes[i].innerHTML.substring(16, 11)}`;
    endTimes[i].innerHTML = `${endTimes[i].innerHTML.substring(16, 11)}`;
  }
};







init();
