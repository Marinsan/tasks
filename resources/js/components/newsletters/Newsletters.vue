<template>
    <span>
        <ul>
            <li><a href="https://mailchimp.com/">https://mailchimp.com/</a></li>
            <li>Usuari: cristianmarin@iesebre.com</li>
            <li>Password: Personal (mireu fitxer .env)</li>
            <li><a href="https://us20.admin.mailchimp.com/lists/">https://us20.admin.mailchimp.com/lists/</a></li>
            <li>Nom de la llista: Ies del Ebre</li>
            <li>Id de la llista: Vegeu .env file</li>
            <li>Prova: </li>
        </ul>

        Members:
        <ul>
            <li v-for="member in newsletter.members" v-text="member.email_address"></li>
        </ul>
    </span>
</template>

<script>
  export default {
    name: 'Newsletters',
    props: {
      newsletter: {
        required: true
      }
    }
  }
</script>