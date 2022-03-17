function TextTyping (textArray = [], placeText, alignText = "center", timeTextTyping = 250, modeTextTyping = 1, displayModeText = 1, colorText = ["#000000", "#C0C0C0"]) 
{
	let out = document.getElementById(placeText);
	let underBlock = document.createElement("div");

	out.style.textAlign = alignText;
	out.style.color = colorText[0];
	out.innerHTML = null;

	function getParamsBlock() 
	{
		let output = '';

		for (let i = 0; i < textArray.length; i++) {
			output += textArray[i] + '<br>';
			out.innerHTML = output;
		}

		let style = window.getComputedStyle(out);

		let width = style.getPropertyValue("width");
		let height = style.getPropertyValue("height");

		out.innerHTML = null;

		return {width: width, height: height};
	}

	let paramsBlock = getParamsBlock();

	function writeTextReverse() 
	{
		let str = textArray.length - 1;
		let count = textArray[str].length;

		function write() 
		{
			let output = "";

			setTimeout(function() 
			{

				for (let i = 0; i < str + 1; i++) {

					if (i === str) {
						for (let j = 0; j < count; j++) {
							output += textArray[i][j];
						}
					} else {
						for (let j = 0; j < textArray[i].length; j++) {
							output += textArray[i][j];
						}
					}

					output += "<br>";
					
				}

				out.innerHTML = output;

				count--;

				if (count <= 0) {
					str--;
					if (str === -1) {
						return writeText();
					}
					count = textArray[str].length;
				}

				write();

			}, timeTextTyping);

		}

		write();
	}

	function setSizeBlocks()
	{
		out.style.width = paramsBlock.width;
		out.style.height = paramsBlock.height;

		underBlock.style.width = paramsBlock.width;
		underBlock.style.height = paramsBlock.height;
	}

	function writeText() 
	{
		let count = 0;
		let str = 0;
		let output = '';

		setSizeBlocks();

		out.style.textAlign = alignText;
		out.innerHTML = null;

		resizeBlock();

		function write() 
		{
			setTimeout(function() 
			{
				if (str === textArray.length) {
					return displayModeText === 1 ? writeText() : writeTextReverse();
				}

				output += textArray[str][count];

				out.innerHTML = output;

				count++;

				if (textArray[str].length <= count) {
					output += "<br>";
					out.innerHTML = output;
					count = 0;
					str++;
				}

				write();

			}, timeTextTyping);

		}

		write();
	}

	function drawText() 
	{
		let output = '';
		let parent = out.parentElement;

		underBlock.style.textAlign = alignText;
		underBlock.style.color = colorText[1];
		underBlock.style.opacity = '.5';
		underBlock.style.position = 'absolute';

		for (let i = 0; i < textArray.length; i++) {
			output += textArray[i] + '<br>';
		}

		underBlock.innerHTML = output;
		
		parent.appendChild(underBlock);
	}

	window.addEventListener('resize', () => {
		resizeBlock();
	})

	function resizeBlock() 
	{
		underBlock.style.left = out.getBoundingClientRect().left + 'px';
		underBlock.style.top = out.getBoundingClientRect().top + 'px';
	}

	function modeTypingFirst() 
	{
		writeText();
	}

	function modeTypingSecond() 
	{
		drawText();
		writeText();
	}

	function start() 
	{
		return modeTextTyping === 1 ? modeTypingFirst() : modeTypingSecond();
	}

	start();

}

TextTyping(['Communicate with pleasure!', 'Общайтесь с удовольствием!', '喜んでコミュニケーションしましょう！'], "textTyping", "center", 200, 1, 2, ['#7d20df', "#C0C0C0"]);