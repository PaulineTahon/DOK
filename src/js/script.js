import es6Promise from 'es6-promise';
import fetch from 'isomorphic-fetch';
es6Promise.polyfill();

const monthArray = [`januari`, `februari`, `maart`, `april`, `mei`, `juni`, `juli`, `augustus`, `september`],
  headerMonth = document.querySelector(`.article__start-event__title`),
  currentMonth = document.querySelector(`.events__header`),
  submitForms = document.querySelectorAll(`.form`),
  tagFilter = document.querySelector(`.tags__form`),
  dateFilter = document.querySelector(`.date__form`),
  zones = document.querySelector(`.zones`),
  dropdown = document.querySelector(`.dropdown-arrow`),
  allEvents = document.querySelectorAll(`.event`),
  next = document.querySelector(`.next`),
  previous = document.querySelector(`.previous`),
  monthEvents = document.querySelector(`.events__month`),
  regulars = document.querySelector(`.regulars`),
  errorImg = document.querySelector(`.error__img`),
  eventsContainer = document.querySelector(`.events`);


let index = 4,
  itemAddForm,
  itemsDay = ` `,
  itemsMonth = ` `;

const init = () => {

  getDatetimeSubstings();

  if (document.querySelector(`.newsletter`)) {
    itemAddForm = document.forms[0];
    itemAddForm.noValidate = true;
    itemAddForm.addEventListener(`submit`, onFormSubmit);
    document.getElementsByName(`email`)[0].addEventListener(`input`, onEmailChange);
    document.getElementsByName(`email`)[0].addEventListener(`blur`, onEmailChange);
  }

  checkIfSecondImg();

  if (document.querySelector(`.dropdown-arrow`)) {
    errorImg.style.display = `none`;
    document.querySelector(`.dropdown-arrow`).addEventListener(`click`, dropdownHandler);
    checkIfTag();
    addSubmitForm();
    addDateFilter();
    getMonth();
  }
};

const checkIfTag = () => {
  tagFilter.addEventListener(`change`, e => {
    e.preventDefault();
    errorImg.style.display = `none`;
    if (zones.style.visibility === `visible` || itemsDay !== ` `) {
      closeDropDown();
    }
    if (dateFilter.querySelector(`.date-day`).value !== ` ` || dateFilter.querySelector(`.date-month`).value !== ` `) {
      dateFilter.querySelector(`.date-day`).value = ` `;
      dateFilter.querySelector(`.date-month`).value = ` `;
      closeDropDown();
    }

    if (regulars !== `none`) {
      regulars.style.display = `none`;
      document.querySelector(`.article__start-event__title`).style.display = `none`;
      next.style.display = `none`;
      previous.style.display = `none`;
    }
    const items = tagFilter.querySelector(`.tags`).value;
    console.log(items);
    if (items === ` `) {
      closeDropDown();
      headerMonth.style.display = ``;
      next.style.display = ``;
      previous.style.display = ``;
    }

    fetch(`index.php?page=programma&tag=${items}`, {
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
  submitForms.forEach(form => {
    form.addEventListener(`submit`, e => {
      e.preventDefault();
      errorImg.style.display = `none`;
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

const addDateFilter = () => {
  dateFilter.addEventListener(`change`, e => {
    errorImg.style.display = `none`;
    e.preventDefault();
    if (zones.style.visibility === `visible` || tagFilter.querySelector(`.tags`).value !== ` `) {
      closeDropDown();
      tagFilter.querySelector(`.tags`).value = ` `;
    }
    if (dateFilter.querySelector(`.date-day`).value === ` ` && dateFilter.querySelector(`.date-month`).value === ` `) {
      closeDropDown();
      headerMonth.style.display = ``;
      next.style.display = ``;
      previous.style.display = ``;
    }

    if (regulars.style.display !== `none`) {
      regulars.style.display = `none`;
      document.querySelector(`.article__start-event__title`).style.display = `none`;
      next.style.display = `none`;
      previous.style.display = `none`;
    }
    itemsDay = dateFilter.querySelector(`.date-day`).value;
    itemsMonth = dateFilter.querySelector(`.date-month`).value;
    const dateStart = `2017-${itemsMonth}-${itemsDay} 00:00:00`;
    const dateEnd = `2017-${itemsMonth}-${itemsDay} 23:59:59`;
    fetch(`index.php?page=programma&datestart=${dateStart}&dateend=${dateEnd}`, {
      headers: new Headers({
        Accept: `application/json`
      })
    })
    .then(r => r.json())
    .then(events => {
      if (events.length !== 0 || itemsMonth === ` ` || itemsDay === ` `) {
        headerMonth.style.marginRight = `0`;
        showDateEvents(events, dateStart);
      }
      if (events.length === 0 && itemsMonth !== ` ` && itemsDay !== ` `) {
        headerMonth.style.display = ``;
        headerMonth.innerHTML = `Oeps! Die dag zijn er nog geen evenementen gepland. <br /> <br /> Was het maar iedere dag DOKdag...`;
        headerMonth.style.margin = `0 auto`;
        eventsContainer.style.paddingTop = `10rem`;
        headerMonth.style.fontSize = `2rem`;
        headerMonth.style.fontFamily = `arial`;
        errorImg.style.display = ``;
        allEvents.forEach(event => {
          event.style.display = `none`;
        });
      }
    });
  });
};

const showDateEvents = (events, dateStart) => {
  console.log(itemsMonth);
  headerMonth.style.color = `#ef8269`;
  headerMonth.style.margin = `0 auto`;
  eventsContainer.style.paddingTop = `10rem`;
  headerMonth.style.fontSize = `2rem`;
  headerMonth.style.fontFamily = `arial`;
  allEvents.forEach(event => {
    event.style.display = ``;
    const startDate = event.querySelector(`.event__start`).innerHTML;
    const shorterDateStart = `${dateStart.substring(10, 8)}/${dateStart.substring(7, 5)}`;
    if (startDate === shorterDateStart) {
      headerMonth.style.display = `none`;
    } else {
      event.style.display = `none`;
    }
  });

  if (itemsMonth === ` `) {
    allEvents.forEach(event => {
      event.style.display = `none`;
    });
    headerMonth.style.display = ``;
    headerMonth.innerHTML = `Gelieve ook een maand te selecteren`;
  } else if (itemsMonth !== ` `) {
    headerMonth.style.display = `none`;
  }

  if (itemsDay === ` `) {
    allEvents.forEach(event => {
      event.style.display = `none`;
    });
    headerMonth.style.display = ``;
    headerMonth.innerHTML = `Gelieve ook een dag te selecteren`;
  } else if (itemsMonth !== ` `) {
    headerMonth.style.display = `none`;
  }

  if (itemsDay === ` ` && itemsMonth === ` `) {
    closeDropDown();
    headerMonth.style.display = ``;
    eventsContainer.style.paddingTop = `10rem`;
    next.style.display = ``;
    previous.style.display = ``;
    headerMonth.style.marginRight = `0`;
  }
};


const showEvents = (events, items) => {
  if(items !== ` `) {
    allEvents.forEach(event => {
      if (!event.classList.contains(`${items}`)) {
        event.style.display = `none`;
      } else {
        event.style.display = ``;
      }
    });
  }
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
  const inputEmail = document.getElementById(`inputEmail`);
  const data = new FormData();
  data.append(`action`, `add-item`);
  data.append(`email`, inputEmail.value);

  event.preventDefault();

  if (!itemAddForm.checkValidity()) {
    checkEmail(document.getElementById(`inputEmail`));
  } else {
    fetch(`index.php`, {
      headers: new Headers({
        Accept: `application/json`
      }),
      method: `post`,
      body: data
    });
    itemAddForm.querySelector(`[name='email']`).value = ``;
    document.querySelector(`.background-img`).style.background = `url(../assets/svg/nieuwsbrief-bg2.svg) no-repeat`;
    document.querySelector(`.background-img`).style.backgroundSize = `30rem auto`;
    document.querySelector(`.background-img`).style.backgroundPosition = `left bottom`;


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

  if (document.querySelector(`.event__title`)) {
    if (document.querySelector(`.event__title`).innerHTML === `BLANCO, ELIZABETH VAN DAM ‘IN LOVE’`) {
      document.querySelector(`.event__end`).classList.remove(`hidden`);
      document.querySelector(`.date__separator`).classList.remove(`hidden`);
    }
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
  headerMonth.innerHTML = `${monthArray[4]}`;
  headerMonth.style.color = `black`;
  currentMonth.style.display = ``;
  headerMonth.style.marginLeft = `0`;
  headerMonth.style.fontSize = `5rem`;
  headerMonth.style.marginRight = `0`;
  monthEvents.style.paddingTop = `0`;
  headerMonth.style.fontFamily = `HereJustNow`;
  index = 4;
  getMonth();
};

const dropdownHandler = () => {
  monthEvents.style.paddingTop = `-25rem`;
  errorImg.style.display = `none`;
  headerMonth.style.display = `none`;
  if (zones.style.visibility === `visible`) {
    closeDropDown();
    headerMonth.style.display = ``;
    next.style.display = ``;
    previous.style.display = ``;
  } else {
    if (tagFilter.querySelector(`.tags`).value !== ` `) {
      tagFilter.querySelector(`.tags`).value = ` `;
    }
    if (dateFilter.querySelector(`.date-day`).value !== ` ` || dateFilter.querySelector(`.date-month`).value !== ` `) {
      dateFilter.querySelector(`.date-day`).value = ` `;
      dateFilter.querySelector(`.date-month`).value = ` `;
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
    headerMonth.style.display = ``;
    headerMonth.style.color = `#ef8269`;
    headerMonth.innerHTML = `Selecteer een zone`;
    eventsContainer.style.paddingTop = `10rem`;
    headerMonth.style.marginLeft = `40rem`;
    headerMonth.style.fontSize = `2rem`;
    headerMonth.style.fontFamily = `arial`;
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
