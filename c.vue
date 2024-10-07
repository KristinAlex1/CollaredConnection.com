<template>
  <div>
    <h2>Contact List</h2>
    <ul>
      <li v-for="contact in contacts" :key="contact.id">
        {{ contact.name }} - {{ contact.email }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      contacts: []
    };
  },
  created() {
    fetch('http://localhost:3000/contacts')
      .then(response => response.json())
      .then(data => {
        this.contacts = data;
      })
      .catch(error => console.error('Error fetching contacts:', error));
  }
};
</script>

<style>

</style>
