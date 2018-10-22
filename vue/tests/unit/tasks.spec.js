/* eslint-disable no-unused-expressions */
import { expect } from 'chai'
import { mount } from '@vue/test-utils'
import Tasks from '../../../resources/js/components/Tasks.vue'
import moxios from 'moxios'

let exampletasks = [
  {
    id: 1,
    name: 'Comprar pa',
    completed: false
  },
  {
    id: 2,
    name: 'Comprar llet',
    completed: true
  },
  {
    id: 3,
    name: 'Estudiar PHP',
    completed: false
  }
]

describe.only('Tasks.vue', () => {
  beforeEach(function () {
    moxios.install(global.axios)
  })

  afterEach(function () {
    moxios.uninstall(global.axios)
  })

  it('shows_error', (done) => {
    // 1 Prepare
    moxios.stubRequest('/api/v1/tasks', {
      status: 500,
      response: 'Error Caca de vaca'
    })

    // 2 execute
    const wrapper = mount(Tasks)

    // Assertion
    moxios.wait(() => {
      expect(wrapper.text()).contains('Ha succeit un error: Error Caca de vaca')
      done()
    })
  })

  it.skip('not_shows_filters_when_no_tasks', (done) => {
    // 1 Prepare
    moxios.stubRequest('/api/v1/tasks', {
      status: 200,
      response: []
    })

    // 2 execute
    const wrapper = mount(Tasks)

    // Assertion
    moxios.wait(() => {
      expect(wrapper.text()).not.contains('Totes')
      done()
    })
  })

  it('shows_filters_when_is_more_than_0_tasks', () => {
    // 2 execute
    const wrapper = mount(Tasks, {
      propsData: {
        tasks: exampletasks
      }
    })

    wrapper.vm.errorMessage = 'Ui que mal!'
    // Assertion

    expect(wrapper.text()).contains('Filtros:')
  })

  it('contains_a_list_of_tasks', () => {
    // 1 PREPARE (OPTIONAL)

    // 2 EXECUTE
    const wrapper = mount(Tasks, {
      propsData: {
        tasks: exampletasks
      }
    }) // <tasks tasks="[{},{},{}]"></tasks>

    // console.log('AQUI TEXT:')
    // console.log(wrapper.text())
    // console.log('AQUI HTML:')
    // console.log(wrapper.html())
    // 3 EXPECT

    expect(wrapper.text()).contains('Comprar pa')
    expect(wrapper.text()).contains('Comprar llet')
    expect(wrapper.text()).contains('Estudiar PHP')

    // wrapper.vm -> Objecte Vue (vm: View Model)
  })

  it.skip('shows_error_when_api_fails', (done) => {
    // 1 Prepare (opcional)
    moxios.stubRequest('/api/v1/tasks', {
      status: 500,
      response: {
        data: 'Ha petat tot estrepitosament'
      }
    })

    // 2 Execució
    const wrapper = mount(Tasks) // <tasks></tasks>
    expect(wrapper.text()).contains('Ha petat tot estrepitosament')
  })

  it('contains_a_list_of_tasks_from_api_if_no_prop_tasks_is_provided', (done) => {
    // 1 Prepare (opcional)
    moxios.stubRequest('/api/v1/tasks', {
      status: 200,
      response: exampletasks
    })

    // 2 Execució
    const wrapper = mount(Tasks) // <tasks></tasks>

    // 3 expectations
    moxios.wait(() => {
      expect(wrapper.text()).contains('Comprar pa')
      expect(wrapper.text()).contains('Comprar llet')
      expect(wrapper.text()).contains('Estudiar PHP')

      // eslint-disable-next-line no-unused-expressions
      expect(wrapper.find('span#task2').classes('strike')).to.be.true

      done()
    })
  })

  it('adds_a_task_with_enter', (done) => {
    // 1
    moxios.stubRequest('/api/v1/tasks', {
      status: 200,
      response: {
        id: 68,
        name: 'Comprar lejia',
        completed: false
      }
    })
    // 2
    const wrapper = mount(Tasks, {
      propsData: {
        tasks: exampletasks
      }
    })
    // input name tasks
    let inputName = wrapper.find("input[name='name']")
    inputName.element.value = 'Comprar lejia'
    // OJO!!! disparar el input!!!
    inputName.trigger('input')
    inputName.trigger('keyup.enter')

    // 3
    moxios.wait(() => {
      expect(wrapper.text()).contains('Comprar lejia')
      done()
    })
  })

  it('delete_a_task', (done) => {
    // 1
    moxios.stubRequest('/api/v1/tasks/1', {
      status: 200
    })
    // 2
    const wrapper = mount(Tasks, {
      propsData: {
        tasks: exampletasks
      }
    })

    let svgDelete = wrapper.find('#deleteTask1')
    svgDelete.trigger('click')

    moxios.wait(() => {
      expect(wrapper.text()).not.contains('Comprar pa')
      done()
    })
  })

  it('adds_a_task', (done) => {
    // 1
    moxios.stubRequest('/api/v1/tasks', {
      status: 200,
      response: {
        id: 69,
        name: 'Comprar lejia',
        completed: false
      }
    })
    // 2
    const wrapper = mount(Tasks, {
      propsData: {
        tasks: exampletasks
      }
    })
    // input name tasks
    let inputName = wrapper.find("input[name='name']")
    inputName.element.value = 'Comprar lejia'
    // OJO!!! disparar el input!!!
    inputName.trigger('input')

    let svg = wrapper.find('svg#button_add_task')
    svg.trigger('click')

    // 3
    moxios.wait(() => {
      expect(wrapper.text()).contains('Comprar lejia')
      done()
    })
  })
})