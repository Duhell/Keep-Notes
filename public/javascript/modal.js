

function openModal(note_id) {
    let deleteLink = document.getElementById('deleteLink')
    document.getElementById('modal').classList.remove('hidden');
    deleteLink.setAttribute('href',`/delete/${note_id}`)

  }

  function closeModal() {
    document.getElementById('modal').classList.add('hidden');
  }

// Remove Session Success Message after deleting a note
  setInterval(()=>{
    let message = document.getElementById('message')
    if(message){
        message.remove()
    }
  },4000)
