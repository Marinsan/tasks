import { expect } from 'chai'
import { mount } from '@vue/test-utils'
import Tasks from '../../../resources/js/components/Tasks.vue'
import moxios from 'moxios'


describe('Tasks.vue', () => {
  beforeEach(function () {
    // import and pass your custom axios instance to this method
    moxios.install(global.axios)
  })

  afterEach(function () {
    // import and pass your custom axios instance to this method
    moxios.uninstall(global.axios)
  })

  it.skip('contains_a_list_of_tasks', () => {
    // 2 execute
    const wrapper = mount(Tasks, {
      propsData: {
        tasks: [
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
      }
    })
    // 3 expect
    console.log('AQUI TEXT')
    console.log(wrapper.text())
    console.log('AQUI HTML')
    console.log(wrapper.html())

    expect(wrapper.text()).contains('Comprar pa')
    expect(wrapper.text()).contains('Comprar llet')
    expect(wrapper.text()).contains('Estudiar PHP')

    expect(wrapper.vm.dataTasks).to.have.lengthOf(3)

    expect(wrapper.vm.dataTasks(0).id).equals(1)
    expect(wrapper.vm.dataTasks(0).name).equals('Comprar pa')
    expect(wrapper.vm.dataTasks(0).completed).equals(false)

    expect(wrapper.vm.dataTasks(1).id).equals(2)
    expect(wrapper.vm.dataTasks(1).name).equals('Comprar llet')
    expect(wrapper.vm.dataTasks(1).completed).equals(true)

    expect(wrapper.vm.dataTasks(3).id).equals(3)
    expect(wrapper.vm.dataTasks(3).name).equals('Estudiar PHP')
    expect(wrapper.vm.dataTasks(3).completed).equals(false)
  })

  it.only('contains_a_list_of_tasks_from_api_if_no_prop_tasks_is_provided', (done) => {
    // 1 Preparacio
  moxios.stubRequest('/api/v1/tasks', {
    status: 200
    response: [
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
    }]
  })
    // 2 Execucio
    const wrapper = mount(Tasks) // <tasks></tasks>
  moxios.wait(() => {
      expect(wrapper.text()).contains('Comprar pa')
      expect(wrapper.text()).contains('Comprar llet')
      expect(wrapper.text()).contains('Estudiar PHP')

      expect(wrapper.vm.dataTasks).to.have.lengthOf(3)

      expect(wrapper.vm.dataTasks(0).id).equals(1)
      expect(wrapper.vm.dataTasks(0).name).equals('Comprar pa')
      expect(wrapper.vm.dataTasks(0).completed).equals(false)

      expect(wrapper.vm.dataTasks(1).id).equals(2)
      expect(wrapper.vm.dataTasks(1).name).equals('Comprar llet')
      expect(wrapper.vm.dataTasks(1).completed).equals(true)

      expect(wrapper.vm.dataTasks(3).id).equals(3)
      expect(wrapper.vm.dataTasks(3).name).equals('Estudiar PHP')
      expect(wrapper.vm.dataTasks(3).completed).equals(false)
      done()
    })
    // 3 Expectation
    // expect(wrapper.text()).to.include('')

    console.log(wrapper.html())
  })
  it.skip('todo2', () => {

  })
})
