// ==UserScript==
// @name         New Userscript
// @namespace    http://tampermonkey.net/
// @version      2024-06-13
// @description  try to take over the world!
// @author       You
// @match        *://*/*
// @icon         https://pkl.hummatech.com/mobilelogo.png
// @grant        GM_xmlhttpRequest
// @grant        GM_addStyle
// ==/UserScript==

GM_addStyle(`
  .sa-button {
    position: fixed !important;
    bottom: 50px !important;
    right: 50px !important;
    width: 40px !important;
    height: 40px !important;
    border-radius: 5px !important;
    cursor: pointer !important;
    z-index: 9998 !important;
    background-image: url("https://pkl.hummatech.com/mobilelogo.png") !important;
    background-color: #ffffff !important;
    background-size: cover !important;
  }
  .zoom-effect {
    animation: zoomInOut 0.3s ease-in-out;
  }
  
  @keyframes zoomInOut {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(0.8);
    }
    100% {
      transform: scale(1);
    }
  }
  `);

(function () {
  'use strict';

  function addButton() {
    let button = document.createElement('button');
    button.classList.add("sa-button");

    let image = document.createElement('img');
    image.src = 'https://pkl.hummatech.com/mobilelogo.png';
    image.style.width = "100% !important";
    image.style.zIndex = "9999 !important";
    button.appendChild(image);

    button.addEventListener('click', () => {
      toggleOverlay();
    });

    document.body.appendChild(button);
  }
  addButton();

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Home') {
      requestJournal();
    } else if (event.key === 'PageUp') {
      requestAbsen();
    }
  });

  function requestJournal() {
    GM_xmlhttpRequest({
      method: 'GET',
      url: 'https://pkl.hummatech.com/api/journals',
      headers: {
        'Authorization': 'Bearer 303|BRVBCQDdS7iFz8xmI13EWGfdjaEzPvHBd3R6SIYv5d173552'
      },
      onload: (resp) => {
        if (resp.status !== 200) {
          console.error('Failed to fetch data:', resp.status);
          return;
        }

        const data = JSON.parse(resp.responseText).data;
        const currentDate = new Date();
        const latestJournal = new Date(data[0].created_at);

        const currentDateStr = currentDate.toISOString().split('T')[0];
        const latestJournalStr = latestJournal.toISOString().split('T')[0];

        alert(currentDateStr === latestJournalStr ? "Anda hari ini sudah journal" : "Anda hari ini belum journal");
      },
      onerror: (error) => {
        console.error('Error:', error);
      }
    });
  }

  function requestAbsen() {
    GM_xmlhttpRequest({
      method: 'GET',
      url: 'https://pkl.hummatech.com/api/attendace',
      headers: {
        'Authorization': 'Bearer 303|BRVBCQDdS7iFz8xmI13EWGfdjaEzPvHBd3R6SIYv5d173552'
      },
      onload: (resp) => {
        if (resp.status !== 200) {
          console.error('Failed to fetch data:', resp.status);
          return;
        }

        const data = JSON.parse(resp.responseText)[0].attendances;
        console.log(JSON.parse(resp.responseText));
        console.log(data);
        const currentDate = new Date();
        // const latestJournal = new Date(data[0].created_at);

        const currentDateStr = currentDate.toISOString().split('T')[0];
        //const latestJournalStr = latestJournal.toISOString().split('T')[0];

        //alert(currentDateStr === latestJournalStr ? "Anda hari ini sudah journal" : "Anda hari ini belum journal");
      },
      onerror: (error) => {
        console.error('Error:', error);
      }
    });
  }
})();
