<script>
export default {
  el: '#app',
  name: 'App',
  data: () => ({
    drawer: null,
    drawerRight: false,
    items: [
      {
        icon: 'keyboard_arrow_up',
        'icon-alt': 'keyboard_arrow_down',
        text: 'Tasques',
        model: false,
        children: [
          { icon: 'list', text: 'Tasks Tailwind', url: '/tasks_vue' },
          { icon: 'format_list_bulleted', text: 'Tasques PHP', url: '/tasks' },
          { icon: 'note_add', text: 'Tasques', url: '/tasques' }
        ]
      },
      { icon: 'library_add', text: 'Tags', url: '/tags' },
      { icon: 'contacts', text: 'Contacte', url: '/contact' },
      { icon: 'person', text: 'Sobre Nosaltres', url: '/about' }
    ]
  }),
  props: {
    source: String
  },
  methods: {
    impersonate (user) {
      if (user) {
        window.location.href = '/impersonate/take/' + user
      }
    }
  }
}
</script>
