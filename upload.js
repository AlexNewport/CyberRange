count = Object.keys(localStorage).length;

const userMessageForm = document.querySelector('form');
const userMessagesList = document.querySelector('ul');

function renderMessages() {

  let messageItems = '';
  const userMessages = [];
  for (i = Object.keys(localStorage).length; i > 0; i--) {  
 	userMessages.push({
    		text: localStorage.getItem("key" + i),
    		image: localStorage.getItem("image" + i),
  	});
  }
  for (const message of userMessages)
  	if (message.text != null) {
  	messageItems = `
      ${messageItems}
      <li class="message-item">
        <div class="message-image">
          <img src='${message.image}' alt='Error: image not found'>
        </div>
        <p>${message.text}</p>
      </li>
    `;
    }

	
  userMessagesList.innerHTML = messageItems;
}

function formSubmitHandler(event) {
  event.preventDefault();
  const userMessageInput = event.target.querySelector('textarea');
  const messageImageInput = event.target.querySelector('input');
  const userMessage = userMessageInput.value;
  const imageUrl = messageImageInput.value;

  if (
    !userMessage ||
    !imageUrl ||
    userMessage.trim().length === 0 ||
    imageUrl.trim().length === 0
  ) {
    alert('Please insert a valid message and image.');
    return;
  }
	count++;
	localStorage.setItem("key" + count, userMessage);
	localStorage.setItem("image" + count, imageUrl);
	
  userMessageInput.value = '';
  messageImageInput.value = '';

  renderMessages();
}

userMessageForm.addEventListener('submit', formSubmitHandler);

window.addEventListener('load', (event) => {
  renderMessages();
});
