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
          { icon: 'history', text: 'Tasques Vue', url: '/tasks_vue' },
          { icon: 'content_copy', text: 'Tasques', url: '/tasks' }
        ]
      },
      { icon: 'contacts', text: 'Tags Vue', url: '/tags_vue' },
      { icon: 'contacts', text: 'Contacte', url: '/contact' },
      { icon: 'content_copy', text: 'Sobre Nosaltres', url: '/about' }
    ]
  }),
  props: {
    source: String
  }
}
</script>
