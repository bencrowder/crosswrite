## Crosswrite

Audio transcription app. Uses HTML5 audio and Javascript, along with jQuery and the jQuery hotkeys plugin. Tested in Chrome and Safari. Doesn't work in Firefox. And the keyboard shortcuts are far from ideal.


### Installation

1. Put the files somewhere.
2. Create two directories, audio/ and transcripts/, and give your web server write rights to them. (For example, `chown apache.apache audio/ transcripts/`, or `chgrp apache audio/ transcripts/; chmod g+w audio/ transcripts/`.)
3. Copy `config.sample.js` to `config.js` and edit.


### Keyboard shortcuts

#### Play/pause

* Play/pause: `ctrl+p`

#### Rewind/fast forward

* Rewind five seconds: `ctrl+j`
* Fast forward five seconds: `ctrl+k`
* Rewind thirty seconds: `ctrl+h`
* Fast forward thirty seconds: `ctrl+l`

#### Jump to beginning/end

* Jump to beginning: `ctrl+0`
* Jump to end: `ctrl+9`

#### Volume control

* Increase volume: `ctrl+1`
* Decrease volume: `ctrl+2`
