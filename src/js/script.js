import es6Promise from 'es6-promise';
import fetch from 'isomorphic-fetch';
es6Promise.polyfill();

const monthArray = [`januari`, `februari`, `maart`, `april`, `mei`, `juni`, `juli`, `augustus`, `september`],
  headerMonth = document.querySelector(`.article__start-event__title`),
  currentMonth = document.querySelector(`.events__header`),
  submitForms = document.querySelectorAll(`.form`),
  tagFilter = document.querySelector(`.tags__form`),
  zones = document.querySelector(`.zones`),
  dropdown = document.querySelector(`.dropdown-arrow`),
  allEvents = document.querySelectorAll(`.event`),
  next = document.querySelector(`.next`),
  previous = document.querySelector(`.previous`),
  monthEvents = document.querySelector(`.events__month`),
  regulars = document.querySelector(`.regulars`);

let index = 4,
  itemAddForm;


const init = () => {

  if (document.querySelector(`.newsletter`)) {
    itemAddForm = document.forms[0];
    itemAddForm.noValidate = true;
    itemAddForm.addEventListener(`submit`, onFormSubmit);
    document.getElementsByName(`email`)[0].addEventListener(`input`, onEmailChange);
    document.getElementsByName(`email`)[0].addEventListener(`blur`, onEmailChange);
  }

  addSubmitForm();
  checkIfSecondImg();
  getDatetimeSubstings();

  if (document.querySelector(`.dropdown-arrow`)) {
    document.querySelector(`.dropdown-arrow`).addEventListener(`click`, dropdownHandler);
    checkIfTag();
    getMonth();
  }
};

const checkIfTag = () => {
  tagFilter.addEventListener(`change`, e => {
    e.preventDefault();
    if (zones.style.visibility === `visible`) {
      closeDropDown();
    }

    if (regulars !== `none`) {
      regulars.style.display = `none`;
      document.querySelector(`.article__start-event__title`).style.display = `none`;
      next.style.display = `none`;
      previous.style.display = `none`;
      monthEvents.style.marginTop = `-20rem`;
    }
    const items = tagFilter.querySelector(`.tags`).value;
    console.log(items);
    if (items === ` `) {
      closeDropDown();
      headerMonth.style.display = ``;
      next.style.display = ``;
      previous.style.display = ``;
    }

    fetch(`index.php?page=programma&locations=${items}`, {
      headers: new Headers({
        Accept: `application/json`
      })
    })
    .then(r => r.json())
    .then(events => {
      showEvents(events, items);
    });
  });
};

const addSubmitForm = () => {
  console.log(submitForms);
  submitForms.forEach(form => {
    console.log(form);
    form.addEventListener(`submit`, e => {
      e.preventDefault();
      const items = form.querySelector(`.data`).value;

      if (currentMonth.style.display !== `none`) {
        currentMonth.style.display = `none`;
      }
      monthEvents.style.display = ``;
      fetch(`index.php?page=programma&locations=${items}`, {
        headers: new Headers({
          Accept: `application/json`
        })
      })
      .then(r => r.json())
      .then(events => {
        showEvents(events, items);
      });
    });
  });
};

const showEvents = (events, items) => {
  const allEvents = document.querySelectorAll(`.event`);
//  const currentLocation = document.querySelectorAll(`.${locations}`);
  allEvents.forEach(event => {
    if (!event.classList.contains(`${items}`)) {
      event.style.display = `none`;
    } else {
      event.style.display = ``;
    }

  });
};

const checkIfSecondImg = () => {
  const img = document.querySelectorAll(`.image`);
  console.log(img);
  console.log(img.length);
  if (img.length > 3) {
    img[1].parentNode.remove();
  }
};

const onFormSubmit = event => {
  event.preventDefault();

  fetch(`${itemAddForm.getAttribute(`action`)}?t=${Date.now()}`, {
    headers: new Headers({
      Accept: `application/json`
    }),
    method: `post`,
    body: new FormData(itemAddForm)
  })

  .then(r => r.json())
  .then(result => {
    if (result.result === `ok`) {
      itemAddForm.querySelector(`[name='email']`).value = ``;
    } else if (!itemAddForm.checkValidity()) {
      checkEmail(document.getElementById(`inputEmail`));
    }
  });
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
    return `Gelieve een emailadres in te vullen`;
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

  if (document.querySelector(`.event__title`).innerHTML === `BLANCO, ELIZABETH VAN DAM ‘IN LOVE’`) {
    document.querySelector(`.event__end`).classList.remove(`hidden`);
    document.querySelector(`.date__separator`).classList.remove(`hidden`);
  }
};

const closeDropDown = () => {
  allEvents.forEach(event => {
    event.style.display = ``;
  });
  zones.style.visibility = `hidden`;
  zones.style.transform = `translateY(-152.2rem)`;
  dropdown.style.transform = `translateY(11rem) rotate(0deg)`;
  monthEvents.style.display = ``;
  regulars.style.display = ``;
  monthEvents.style.marginLeft = `0`;
  monthEvents.style.width = `85vw`;
  monthEvents.style.marginTop = `2rem`;
  headerMonth.innerHTML = `${monthArray[4]}`;
  currentMonth.style.display = ``;
  headerMonth.style.marginLeft = `0`;
  headerMonth.style.fontSize = `5rem`;
  headerMonth.style.fontFamily = `HereJustNow`;
  headerMonth.style.fontWeight = `normal`;
  index = 4;
  getMonth();
};

const dropdownHandler = () => {
  if (zones.style.visibility === `visible`) {
    closeDropDown();
    headerMonth.style.display = ``;
    next.style.display = ``;
    previous.style.display = ``;
  } else {
    if (tagFilter.querySelector(`.tags`).value !== ` `) {
      tagFilter.querySelector(`.tags`).value = ` `;
    //  document.querySelector(`.events`).style.paddingTop = `25rem`;
    }
    next.style.display = `none`;
    previous.style.display = `none`;
    zones.style.visibility = `visible`;
    zones.style.transform = `translateY(0)`;
    dropdown.style.transform = `rotate(-180deg) translateY(-68rem)`;
    regulars.style.display = `none`;
    monthEvents.style.display = `none`;
    monthEvents.style.marginLeft = `50rem`;
    monthEvents.style.width = `65vw`;
    monthEvents.style.marginTop = `-20rem`;
    headerMonth.innerHTML = `Selecteer een zone`;
    headerMonth.style.marginLeft = `50rem`;
    headerMonth.style.fontSize = `2rem`;
    headerMonth.style.fontFamily = `arial`;
    headerMonth.style.fontWeight = `bold`;
    // if (document.querySelector(`.events__month`).style.marginTop === `-20rem`) {
    //   document.querySelector(`.events__month`).style.marginTop = `-10rem`;
    // }

  }

};

const getMonth = () => {
  allEvents.forEach(event => {
    if (event.style.display === `none`) {
      event.style.display = ``;
    }
  });
  headerMonth.innerHTML = monthArray[index];
  const startDates = document.querySelectorAll(`.event__start`);
  startDates.forEach(startDate => {
    const monthDate = startDate.innerHTML.substring(5, 4);
    console.log(monthDate, index + 1);
    if (monthDate !== `${index + 1}`) {
      startDate.parentNode.parentNode.parentNode.style.display = `none`;
    }
  });
  next.addEventListener(`click`, nextMonthHandler);
  previous.addEventListener(`click`, previousMonthHandler);
};

const nextMonthHandler = () => {
  allEvents.forEach(event => {
    if (event.style.display === `none`) {
      event.style.display === ``;
    }
  });
  index ++;
  if (index > 8) {
    index = 4;
  }
  getMonth();
};

const previousMonthHandler = () => {
  allEvents.forEach(event => {
    if (event.style.display === `none`) {
      event.style.display === ``;
    }
  });
  index --;
  if (index < 4) {
    index = 8;
  }
  getMonth();
};

init();
