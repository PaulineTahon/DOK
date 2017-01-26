const $form = document.forms[0];
const monthArray = [`mei`, `juni`, `juli`, `augustus`, `september`],
  currentMonth = document.querySelector(`.article__start-event__title`);

let index = 0;

const init = () => {
  getDatetimeSubstings();

  document.querySelector(`.dropdown-arrow`).addEventListener(`click`, dropdownHandler);
  getMonth(currentMonth);

  $form.noValidate = true;
  $form.addEventListener(`submit`, onFormSubmit);
  document.getElementsByName(`email`)[0].addEventListener(`input`, onEmailChange);
  document.getElementsByName(`email`)[0].addEventListener(`blur`, onEmailChange);
};

const onFormSubmit = event => {
  event.preventDefault();
  if (!$form.checkValidity()) {
    checkEmail(document.getElementById(`email`));
  } else {
    document.getElementById(`email`).value;
  }
};

const onEmailChange = e => {
  const $veld = e.currentTarget;
  if (e.type === `blur`) {
    checkEmail($veld);
  } else if (e.type === `input`) {
    if ($veld.validity.valid) {
      $veld.parentNode.querySelector(`.error`).innerHTML = ``;
    }
  }
};

const checkEmail = $veld => {
  if (valueMissing($veld)) {
    $veld.parentNode.querySelector(`.error`).innerHTML = valueMissing($veld);
  } else if (typeMismatch($veld)) {
    $veld.parentNode.querySelector(`.error`).innerHTML = typeMismatch($veld);
  }
};

const valueMissing = $veld => {
  if ($veld.validity.valueMissing) {
    return `Dit veld is verplicht`;
  }
  return ``;
};

const typeMismatch = $veld => {
  if ($veld.validity.typeMismatch) {
    return `Dit is geen geldig e-mailadres`;
  }
  return ``;
};

const getDatetimeSubstings = () => {
  const startDates = document.querySelectorAll(`.event__start`),
    endDates = document.querySelectorAll(`.event__end`),
    startTimes = document.querySelectorAll(`.event__starttime`),
    endTimes = document.querySelectorAll(`.event__endtime`);

  for (let i = 0;i < startDates.length;i ++) {
    console.log();
    startDates[i].innerHTML = `${startDates[i].innerHTML.substring(10, 8)}/${startDates[i].innerHTML.substring(7, 5)}`;
    endDates[i].innerHTML = `${endDates[i].innerHTML.substring(10, 8)}/${endDates[i].innerHTML.substring(7, 5)}`;
    startTimes[i].innerHTML = `${startTimes[i].innerHTML.substring(16, 11)}`;
    endTimes[i].innerHTML = `${endTimes[i].innerHTML.substring(16, 11)}`;
  }

  if (document.querySelector(`.article__title`).innerHTML === `BLANCO, ELIZABETH VAN DAM ‘IN LOVE’`) {
    document.querySelector(`.event__end`).classList.remove(`hidden`);
    document.querySelector(`.date_separator`).classList.remove(`hidden`);
  }
};

const dropdownHandler = e => {
  const dropdown = e.currentTarget;
  const zones = document.querySelector(`.zones`);
  if (zones.style.visibility === `visible`) {
    zones.style.visibility = `hidden`;
    zones.style.transform = `translateY(-152.2rem)`;
    dropdown.style.transform = `translateY(12rem) rotate(0deg)`;
    document.querySelector(`.events__month`).style.display = ``;
    document.querySelector(`.regulars`).style.display = ``;
    document.querySelector(`.events__month`).style.marginTop = `1rem`;
    document.querySelector(`.events__month`).style.marginLeft = `5rem`;
    document.querySelector(`.events__month`).style.width = `75vw`;
    document.querySelector(`.events__month`).style.marginTop = `0`;
    currentMonth.innerHTML = `${monthArray[0]}`;
    currentMonth.style.marginLeft = `0`;
    currentMonth.style.fontSize = `5rem`;
    currentMonth.style.fontFamily = `HereJustNow`;
    currentMonth.style.fontWeight = `normal`;


  } else {
    zones.style.visibility = `visible`;
    zones.style.transform = `translateY(0)`;
    dropdown.style.transform = `rotate(-180deg) translateY(-88rem)`;
    document.querySelector(`.regulars`).style.display = `none`;
    document.querySelector(`.events__month`).style.display = `none`;
    document.querySelector(`.events__month`).style.marginLeft = `50rem`;
    document.querySelector(`.events__month`).style.width = `50vw`;
    document.querySelector(`.events__month`).style.marginTop = `-20rem`;
    currentMonth.innerHTML = `Selecteer een zone`;
    currentMonth.style.marginLeft = `80rem`;
    currentMonth.style.fontSize = `2.5rem`;
    currentMonth.style.fontFamily = `arial`;
    currentMonth.style.fontWeight = `bold`;

  }

};

const getMonth = currentMonth => {
  currentMonth.innerHTML = monthArray[index];
  currentMonth.addEventListener(`click`, monthHandler);
};

const monthHandler = e => {
  index ++;
  if (index > 4) {
    index = 0;
  }
  getMonth(e.currentTarget);
};

init();
