import React, { useState, useEffect } from 'react';

function Contacts() {
  const [contacts, setContacts] = useState([]);

  useEffect(() => {
    fetch('http://localhost:3000/contacts')
      .then(response => response.json())
      .then(data => setContacts(data))
      .catch(error => console.error('Error fetching contacts:', error));
  }, []);

  return (
    <div>
      <h2>Contact List</h2>
      <ul>
        {contacts.map(contact => (
          <li key={contact.id}>{contact.name} - {contact.email}</li>
        ))}
      </ul>
    </div>
  );
}

export default Contacts;
