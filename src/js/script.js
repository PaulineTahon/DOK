const init = () => {
  getDatetimeSubstings();
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
