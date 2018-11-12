<script>
export default {
  el: '#app',
  name: 'App',
  data: () => ({
    drawer: null,
    items: [
      {
        icon: 'keyboard_arrow_up',
        'icon-alt': 'keyboard_arrow_down',
        text: 'Tasques',
        model: false,
        children: [
          { icon: 'history', text: 'Tasks Tailwind', url: '/tasks_vue' },
          { icon: 'content_copy', text: 'Tasques PHP', url: '/tasks' },
          { icon: 'content_copy', text: 'Tasques', url: '/tasques' }
        ]
      },
       { icon: 'contacts', text: 'Tags', url: '/tags' },
      { icon: 'contacts', text: 'Contacte', url: '/contact' },
      { icon: 'content_copy', text: 'Sobre Nosaltres', url: '/about' }
    ]
  }),
  props: {
    source: String
  }
}
</script>
