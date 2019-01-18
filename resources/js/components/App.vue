<script>
export default {
  el: '#app',
  name: 'App',
  data: () => ({
    drawer: false,
    drawerRight: false,
    items: [
      { icon: 'home', text: 'Inici', url: '/' },
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
      { icon: 'build', text: 'Changelog', url: '/changelog' },
      { icon: 'contacts', text: 'Contacte', url: '/contact' },
      { icon: 'person', text: 'Sobre Nosaltres', url: '/about' }
    ]
  }),
  props: {
    source: String
  }
}
</script>
