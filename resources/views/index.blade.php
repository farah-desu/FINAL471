<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Create</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            /* background-image: url('{{ asset("wallpapers/" . $wallpaper) }}'); */
            background-image: url('{{ asset($wallpaper) }}');
            background-size: cover;
            color: #fff;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .profile {
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            align-items: center;
        }

        .profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .profile span {
            font-size: 16px;
        }

        .quote {
            padding: 10px;
            font-weight: bold;
            font-style: italic;
            backdrop-filter: blur(5px);
            position: absolute;
            right: 3%;
            color:white;
            font-size: 24px;
            border-radius: 15px;
            text-shadow: 0 3px 5px rgba(0, 0, 0, 0.701);
            -webkit-text-stroke: 1px rgb(0, 0, 0);
        }
        

        .quote small {
            display: block;
            margin-top: 5px;
            font-size: 18px;
            opacity: 0.8;
        }

        .menu {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 10px;
        }

        .menu button {
            background:rgba(68, 68, 68, 0.2);
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            color: #fff;
            border-radius: 100px;
            border: 2px solid white ;
            cursor: pointer;
            transition: background 0.3s;
        }

        .menu button:hover {
            border: 2px dashed rgb(173, 173, 173) ;
            backdrop-filter: blur(26px);
        }
        .qbtn {
            background: #44444400;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            color: #fff;
            border-radius: 100px;
            border: 2px solid white ;
            cursor: pointer;
            transition: background 0.3s;
        }

        .qbtn:hover {
            border: 2px dashed rgb(173, 173, 173) ;
            backdrop-filter: blur(26px);
        }

        /* Timer CSS */
        #timer_tab{
            position: relative;
            top: -310px;
            right: -120px;
        }
        .timer-container {
            width: 300px;
            border: 1px solid black;
      position: absolute;
      text-align: center;
      background-color: rgba(0, 0, 0, 0);
      backdrop-filter: blur(10px);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      cursor: grab;
        }

        .inputs {
        margin-bottom: 10px;
        }

        .inputs input {
        width: 60px;
        padding: 5px;
        font-size: 1rem;
        text-align: center;
        margin: 0 5px;
        background-color: rgba(0, 0, 0, 0.311);
        border: none;
        border-radius: 5px;
        }
        .inputs input::placeholder{
            color:white;
        }

        select {
        padding: 5px;
        font-size: 1rem;
        border: none;
        border-radius: 5px;
        background-color: rgba(0, 0, 0, 0.311);
        color: rgb(255, 255, 255);
        margin-bottom: 10px;
        }

        .timer {
        font-size: 2.5rem;
        margin: 10px 0;
        padding: 10px;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 10px;
        }

        .Tbtn {
        padding: 10px 20px;
        font-size: 1rem;
        color: white;
        background-color: rgba(0, 128, 128, 0.694);
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 5px;
        }

        .Tbtn:hover {
        background-color: rgb(17, 240, 240);
        }
        /* Popup Modal */
        .modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        background-color: rgba(0, 0, 0, 0.9);
        padding: 20px;
        text-align: center;
        border-radius: 10px;
        color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
        }

        .modal button {
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 1rem;
        background-color: #FF3E3E;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        }

        .modal button:hover {
        background-color: #FF1A1A;
        }

        .modal h2 {
        margin-bottom: 20px;
        }
        .timer_tab{
            display: none;
        }
        .music_tab {
        display: none;
        }
        #music_tab{
                position: relative;
                top: -310px;
                right: -200px;
            }

            /*music tab*/
            .music-player {
                background: rgba(255, 255, 255, 0.1);
                border-radius: 15px;
                backdrop-filter: blur(10px);
                padding: 20px;
                width: 350px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                color: rgb(2, 2, 2);
                text-align: center;
            }
            .music-player h2 {
                font-size: 1.8em;
                margin-bottom: 10px;
            }
            .audio-controls {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 20px;
            }
            .audio-controls input[type="range"] {
                flex-grow: 1;
                margin: 0 10px;
                background: black;
            }
            .music-list {
                list-style: none;
                padding: 0;
                max-height: 150px;
                overflow-y: auto;
                margin-bottom: 10px;
                border: 1px solid rgba(255, 255, 255, 0.3);
                border-radius: 5px;
            }
            .music-list li {
                padding: 10px;
                cursor: pointer;
                transition: background 0.3s, color 0.3s;
            }
            .music-list li:hover {
                background: rgba(255, 255, 255, 0.2);
                color: #fff;
            }
            .options {
                display: flex;
                justify-content: center;
                gap: 10px;
            }
            .options button {
                padding: 10px 20px;
                background: rgba(0, 0, 0, 0.6);
                border: none;
                border-radius: 10px;
                color: white;
                font-size: 1em;
                cursor: pointer;
                transition: background 0.3s;
            }
            .options button:hover {
                background: rgba(255, 255, 255, 0.3);
            }
            .quote {
                font-size: 0.9em;
                color: rgba(255, 255, 255, 0.7);
                margin-top: 20px;
            }

            /* Custom scrollbar styling */
            .music-list::-webkit-scrollbar {
                width: 8px;
            }
            .music-list::-webkit-scrollbar-thumb {
                background: rgba(255, 255, 255, 0.5);
                border-radius: 4px;
            }
            .music-list::-webkit-scrollbar-thumb:hover {
                background: rgba(255, 255, 255, 0.7);
            }
            .music-list::-webkit-scrollbar-track {
                background: transparent;
            }
            .tip_tab{
                position: relative;
                top: -310px;
                right: -250px;
            }
            #tip_tab{
                display:none;
            }
            .wall_tab{
                
                position: relative;
                top: -310px;
                right: -350px;
            }
            .wall_tab{
                
                display:none;
            }
            .wall_div {
                display:grid;
                grid-template-columns: 1fr 1fr;
                list-style: none;
                padding: 0;
                max-height: 250px;
                scrollbar-width: none;
                overflow-y: auto;
                margin-bottom: 10px;
                border: 1px solid rgba(255, 255, 255, 0.3);
                border-radius: 5px;
            }
            .wall_div img{
                padding:5px;
            }
            .wall_div {
                padding: 10px;
                cursor: pointer;
                transition: background 0.3s, color 0.3s;
            }
            .wall-container {
            width: 400px;
            border: 1px solid black;
            position: absolute;
            text-align: center;
            background-color: rgba(0, 0, 0, 0);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            cursor: grab;
                }

    </style>
</head>
<body>
    <div>
        <!-- Profile Section -->
        <div class="profile">
            <img src="{{ asset($profile_pic) }}" alt="Profile Picture">

            <div>
                <span>{{$mail}}</span><br>
            </div>
        </div>

        <!-- Workspace Section -->
        <div class="content">
            <div class="workspace">
                <!-- Menu Buttons -->
                <div class="menu">
                    <button onclick="toggle('timer_tab')">Timer</button>
                    <button onclick="toggle('music_tab')">Music</button>
                    <button onclick="toggle('tip_tab')">Tips</button>
                    <button onclick="toggle('wall_tab')">Background</button>
                    <style>
                      
                        button a {
                          text-decoration: none; /* Removes underline */
                          color: white; /* Makes the text white */
                        }
                    
                      </style>
                    <button><a href="home?user_id={{ $user_id }}">Shop Home</a></button>
                </div>
                <div class="wall_tab" id="wall_tab">
                    <div class="wall-container">
                        <div class="wall_div">
                    <?php foreach($default_wallpaper as $r): ?> 
                       <a href="changewall?wallname={{ $r->wallpaper }}&user_id={{ $user_id }}"> <img src="<?= htmlspecialchars($r->wallpaper) ?>" width="150px"></a>
                    <?php endforeach; ?>
                    <?php foreach($wallpapers as $r): ?> 
                       <a href="changewall?wallname={{ $r->product_image }}&user_id={{ $user_id }}"> <img src="<?= htmlspecialchars($r->product_image) ?>" width="150px"></a>
                    <?php endforeach; ?>
                    </div>
                    </div>
                    
                </div> 
                <div class="tip_tab" id="tip_tab">
                <div class="timer-container">
                        <h1>Tip of The Day</h1>
                        <small id="tip_text">Loading...</small><br>
                        <button 
                            class="qbtn" 
                            id="tip-btn" 
                            style="
                                text-decoration: none; 
                                color: white; 
                                border: 2px solid white; 
                                border-radius: 100px; 
                                padding: 5px 10px; 
                                display: inline-block; 
                                opacity: 0.7;">
                            Shuffle
                        </button>
                    </div>

                    
                </div> 
                <!-- Quote Section -->
                <div class="quote" id="quote-container" style="text-align: center; color: white;">
                        <h1 id="quote-text">Loading...</h1>
                        <small id="quote-author"></small>
                        <button class="qbtn" href="#"
                            id="shuffle-btn"
                            style="text-decoration: none; 
                                color: white; 
                                border: 2px solid white; 
                                border-radius: 100px; 
                                padding: 5px 10px; 
                                display: inline-block; 
                                opacity: 0.7;" 
                            onmouseover="this.style.borderStyle='dotted'" 
                            onmouseout="this.style.borderStyle='solid'">
                            Shuffle
                        </button>
                    </div>

            </div>
        </div>
    </div>

    <div class="timer_tab" id="timer_tab">
        <div class="timer-container" id="timer-container">
          <h1>Timer</h1>
          <select id="timer-type">
            <option value="study">Study</option>
            <option value="break">Break</option>
          </select>
          <div class="inputs">
            <input type="number" id="hours-input" style="color:white;" placeholder="hh" min="0">
            <input type="number" id="minutes-input" style="color:white;" placeholder="mm" min="0" max="59">
            <input type="number" id="seconds-input" style="color:white;" placeholder="ss" min="0" max="59">
          </div>
          <div class="timer" id="timer-display">00:00:00</div>
          <button class="Tbtn" id="start-button">Start</button>
          <button class="Tbtn" id="pause-button" class="pause">Pause</button>
          <button class="Tbtn" id="reset-button">Reset</button>
        </div>
      
        <!-- Popup Modal -->
        <div class="modal" id="time-up-modal">
          <h2 id="modal-message">Time is up!</h2>
          <button id="modal-ok-button">OK</button>
        </div>
      </div>

     <div class="music_tab" id="music_tab">
    <div class="timer-container" id="music-container">
        <h1>Music Player</h1>
        <div class="audio-controls">
            <button id="play-pause">▶️</button>
            <input type="range" id="progress" value="0" min="0" max="100">
            <span id="current-track"></span>
        </div>
        <ul class="music-list" id="music-list">
            <?php foreach($default_music as $m): ?> 
                <li data-src="lofi/<?= htmlspecialchars($m->music) ?>.mp3">
                    <?= htmlspecialchars($m->music) ?>
                </li>
            <?php endforeach; ?>
            <?php foreach($musics as $m): ?> 
                <li data-src="lofi/<?= htmlspecialchars($m->product_image) ?>.mp3">
                    <?= htmlspecialchars($m->product_image) ?>
                </li>
            <?php endforeach; ?>
            
        </ul>
        <div class="options">
            <button id="toggle-mode">Repeat All</button>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const tipText = document.getElementById('tip_text');
    const tipBtn = document.getElementById('tip-btn');

    // Function to fetch the tip
    function fetchtip() {
        fetch('/get-tip') // Adjust the endpoint if needed
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    tipText.textContent = `"${data.tip}"`;
                } else {
                    tipText.textContent = 'No tips available.';
                }
            })
            .catch(error => {
                console.error('Error fetching tips:', error);
                tipText.textContent = 'Error fetching tips.';
            });
    }

    // Initial fetch when the page loads
    fetchtip();

    // Add click listener to fetch a new tip
    tipBtn.addEventListener('click', fetchtip);
});


    document.addEventListener('DOMContentLoaded', function () {
    const quoteText = document.getElementById('quote-text');
    const quoteAuthor = document.getElementById('quote-author');
    const shuffleBtn = document.getElementById('shuffle-btn');

    // Function to fetch a quote
    function changewallpaper(){
        fetch('/changewall')
    }
    function fetchQuote() {
        fetch('/get-quote')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    quoteText.textContent = `"${data.quote}"`;
                    quoteAuthor.textContent = `- ${data.author}`;
                } else {
                    quoteText.textContent = 'No quotes available.';
                    quoteAuthor.textContent = '';
                }
            })
            .catch(error => {
                console.error('Error fetching quote:', error);
                quoteText.textContent = 'Error fetching quote.';
                quoteAuthor.textContent = '';
            });
    }
    fetchQuote();

    // Fetch a new quote when "Shuffle" is clicked
    shuffleBtn.addEventListener('click', function (e) {
        e.preventDefault();
        fetchQuote();
    });
});


    function toggle(name) {
        const musicTab = document.getElementById(name);
        if (musicTab.style.display === 'block') {
            musicTab.style.display = 'none';
        } else {
            musicTab.style.display = 'block';
        }
    }
    

    const musicContainer = document.getElementById('music-container');
    let isMusicDragging = false;
    let musicOffsetX, musicOffsetY;

    // Dragging functionality for Music Player
    musicContainer.addEventListener('mousedown', (e) => {
        if (e.target !== musicContainer) return; // Drag only from the container
        isMusicDragging = true;
        musicOffsetX = e.clientX - musicContainer.offsetLeft;
        musicOffsetY = e.clientY - musicContainer.offsetTop;
        e.preventDefault();
    });

    document.addEventListener('mousemove', (e) => {
        if (isMusicDragging) {
            musicContainer.style.left = `${e.clientX - musicOffsetX}px`;
            musicContainer.style.top = `${e.clientY - musicOffsetY}px`;
        }
    });

    document.addEventListener('mouseup', () => {
        isMusicDragging = false;
    });
    const audio = new Audio();
audio.preload = "auto"; // Preload audio to allow seeking

let isPlaying = false;
let currentTrackIndex = 0;
let mode = "repeat-all"; // Options: "shuffle", "repeat-one", "repeat-all"

const playPauseButton = document.getElementById('play-pause');
const progressBar = document.getElementById('progress');
const musicList = document.getElementById('music-list');
const currentTrackLabel = document.getElementById('current-track');
const toggleModeButton = document.getElementById('toggle-mode');

const tracks = Array.from(musicList.children);

function playTrack(index) {
    const selectedTrack = tracks[index];
    if (!selectedTrack) return;

    audio.src = selectedTrack.getAttribute('data-src');
    currentTrackLabel.textContent = selectedTrack.textContent;
    currentTrackIndex = index;

    // Reset progress bar when a new track is selected
    progressBar.value = 0;
    audio.load();  // Load the track to ensure it's ready to play
}

playPauseButton.addEventListener('click', () => {
    if (isPlaying) {
        audio.pause();
        playPauseButton.textContent = '▶️';
    } else {
        audio.play();
        playPauseButton.textContent = '⏸️';
    }
    isPlaying = !isPlaying;
});

// Update progress bar when the track is playing
audio.addEventListener('timeupdate', () => {
    if (audio.duration) {
        progressBar.value = (audio.currentTime / audio.duration) * 100;
    }
});

// Seek music by adjusting current time
progressBar.addEventListener('input', () => {
    if (audio.duration) {
        audio.currentTime = (progressBar.value / 100) * audio.duration;
    }
});

// Select a track from the list
musicList.addEventListener('click', (e) => {
    if (e.target.tagName === 'LI') {
        const index = tracks.indexOf(e.target);
        playTrack(index);
    }
});

// Toggle Shuffle or Repeat Mode
toggleModeButton.addEventListener('click', () => {
    if (mode === "repeat-all") {
        mode = "repeat-one";
        toggleModeButton.textContent = "Repeat One";
    } else if (mode === "repeat-one") {
        mode = "shuffle";
        toggleModeButton.textContent = "Shuffle";
    } else {
        mode = "repeat-all";
        toggleModeButton.textContent = "Repeat All";
    }
});

// Handle Auto-Play Logic
audio.addEventListener('ended', () => {
    if (mode === "repeat-one") {
        audio.currentTime = 0;
        audio.play();
    } else if (mode === "shuffle") {
        const randomIndex = Math.floor(Math.random() * tracks.length);
        playTrack(randomIndex);
        audio.play();
    } else if (mode === "repeat-all" || currentTrackIndex < tracks.length - 1) {
        playTrack((currentTrackIndex + 1) % tracks.length);
        audio.play();
    }
});

// Set initial track
playTrack(0);

</script>

<script>
        
        const timerContainer = document.getElementById('timer-container');
        const timerDisplay = document.getElementById('timer-display');
        const hoursInput = document.getElementById('hours-input');
        const minutesInput = document.getElementById('minutes-input');
        const secondsInput = document.getElementById('seconds-input');
        const timerType = document.getElementById('timer-type');
        const startButton = document.getElementById('start-button');
        const pauseButton = document.getElementById('pause-button');
        const resetButton = document.getElementById('reset-button');
        const modal = document.getElementById('time-up-modal');
        const modalMessage = document.getElementById('modal-message');
        const modalOkButton = document.getElementById('modal-ok-button');
    
        let timerInterval;
        let remainingTime = 0;
        let isPaused = false;
        // Timer functionality
        function formatTime(seconds) {
          const hrs = String(Math.floor(seconds / 3600)).padStart(2, '0');
          const mins = String(Math.floor((seconds % 3600) / 60)).padStart(2, '0');
          const secs = String(seconds % 60).padStart(2, '0');
          return `${hrs}:${mins}:${secs}`;
        }
    
        function startTimer() {
          if (timerInterval) clearInterval(timerInterval);
    
          if (!isPaused) {
            const hours = parseInt(hoursInput.value) || 0;
            const minutes = parseInt(minutesInput.value) || 0;
            const seconds = parseInt(secondsInput.value) || 0;
            remainingTime = hours * 3600 + minutes * 60 + seconds;
    
            if (remainingTime <= 0) return;
          }
    
          timerInterval = setInterval(() => {
            if (remainingTime > 0) {
              remainingTime--;
              timerDisplay.textContent = formatTime(remainingTime);
            } else {
              clearInterval(timerInterval);
              showModal();
            }
          }, 1000);
    
          isPaused = false;
        }
    
        function pauseTimer() {
          if (timerInterval) {
            clearInterval(timerInterval);
            isPaused = true;
          }
        }
    
        function resetTimer() {
          clearInterval(timerInterval);
          timerDisplay.textContent = '00:00:00';
          hoursInput.value = '';
          minutesInput.value = '';
          secondsInput.value = '';
          remainingTime = 0;
          isPaused = false;
        }
    
        function showModal() {
        const type = timerType.value === "study" ? "Study session" : "Break";
        modalMessage.textContent = `${type} time is up!`;
        modal.style.display = 'block';

        const m = parseInt(minutesInput.value) || 0;
        const h = parseInt(hoursInput.value) || 0;
        const total = m + h * 60; // Convert hours to minutes and add
        
        const urlParams = new URLSearchParams(window.location.search);
        const userId = urlParams.get('user_id'); // This will get the value of 'user_id'

        


        fetch(`/insert_currency/${total}/ ${userId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not OK');
                }
                return response.json();
            })
            .then(data => {
                alert(data.message); // Shows success message
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to update the balance. Please try again.');
            });
        }
        function hideModal() {
          modal.style.display = 'none';
        }
    
        startButton.addEventListener('click', startTimer);
        pauseButton.addEventListener('click', pauseTimer);
        resetButton.addEventListener('click', resetTimer);
        modalOkButton.addEventListener('click', hideModal);
    
        // Dragging functionality
        let isDragging = false;
        let offsetX, offsetY;
    
        timerContainer.addEventListener('mousedown', (e) => {
          if (e.target !== timerContainer) return; // Only allow dragging from the container itself
          isDragging = true;
          offsetX = e.clientX - timerContainer.offsetLeft;
          offsetY = e.clientY - timerContainer.offsetTop;
          e.preventDefault();
        });
    
        document.addEventListener('mousemove', (e) => {
          if (isDragging) {
            timerContainer.style.left = `${e.clientX - offsetX}px`;
            timerContainer.style.top = `${e.clientY - offsetY}px`;
          }
        });
    
        document.addEventListener('mouseup', () => {
          isDragging = false;
        });
</script>

    
</body>
</html>
