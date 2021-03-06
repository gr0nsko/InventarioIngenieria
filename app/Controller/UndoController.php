<?php

App::uses('AppController', 'Controller');

class UndoController extends AppController {


  public function createMemento($action, $type, $data) {
    $counter = $this->Session->check('Memento.counter') ? $this->Session->read('Memento.counter') + 1 : 1;
    $this->Session->write('Memento.counter', $counter);
    $memento = 'Memento.' . $counter;
    $this->Session->write($memento . '.action', $action);
    $this->Session->write($memento . '.id', $data['id']);
    $this->Session->write($memento . '.type', $type);
    $this->Session->write($memento . '.data', $data);

    if($action == "edit" && !$this->Session->check($memento . '.data.item_picture')) $this->Session->write($memento . '.data.item_picture', "");
  }

  /**
   *  Returns to the last state of the database and changes the view to actual index.
   */
  public function setMemento() {
    $counter = $this->Session->check('Memento.counter') ? $this->Session->read('Memento.counter') : 0;
    $this->Session->write('Memento.counter', $counter > 0 ? $counter - 1 : 0);
    $memento = 'Memento.' . $counter;
    $action = $this->Session->read($memento . '.action');
    $type = $this->Session->read($memento . '.type');
    $data = $this->Session->read($memento . '.data');

    switch ($action) {
      case 'add':
      // this will reverse the last add action
        if($type == 'item') {
          $this->request->allowMethod('post', 'delete');
          if($this->Item->delete($this->Session->read($memento . '.id'))) {
            $this->Session->setFlash(__('Action has been reversed and the item has been deleted.'));
          } else {
            $this->Session->setFlash(__('The action could not be reversed and item could not be deleted. Please, try again.'));
          }
        } else {
          $this->Category->id = $this->Session->read($memento . '.id');
          $this->request->allowMethod('post', 'delete');
          if($this->Category->delete()) {
            $this->Session->setFlash(__('Action has been reversed and the category has been deleted.'));
          } else {
            $this->Session->setFlash(__('The action could not be reversed and category could not be deleted. Please, try again.'));
          }
        }
      break;
      case 'edit':
        if($type == 'item') {
          $this->Item->query("UPDATE inventario.items SET " .
                       "item_description = '" . $data['Item']['item_description'] . "', " .
                       "item_unit_id = '" . $data['Item']['item_unit_id'] . "', " .
                       "item_price = '" . $data['Item']['item_price'] . "', " .
                       "item_picture = '" . $data['Item']['item_picture'] . "', " .
                       "item_category_id = '" . $data['Item']['item_category_id'] . "' " .
                       "WHERE items.item_id = '" . $data['Item']['item_id'] . "';");
          $this->Session->setFlash(__('Action has been reversed and the item has been updated.'));
        } else {
          $this->Category->query("UPDATE inventario.categories SET " .
                       "category_description = '" . $data['Category']['category_description'] . "', " .
                       "category_level = '" . $data['Category']['category_level'] . "', " .
                       "category_parent_id = '" . $data['Category']['category_parent_id'] . "' " .
                       "WHERE categories.category_id = '" . $data['Category']['category_id'] . "';");
          $this->Session->setFlash(__('Action has been reversed and the category has been updated.'));
        }
      break;
      case 'delete':
        if($type == 'item') {
          $this->Item->query("INSERT INTO inventario.items (item_id, item_description, item_unit_id, item_price, item_picture, item_category_id) VALUES ('" .
                       $data['Item']['item_id'] . "', '" .
                       $data['Item']['item_description'] . "', '" .
                       $data['Item']['item_unit_id'] . "', '" .
                       $data['Item']['item_price'] . "', '" .
                       $data['Item']['item_picture'] . "', '" .
                       $data['Item']['item_category_id'] . "');");
          $this->Session->setFlash(__('Action has been reversed and the item has been added to the inventory.'));
        } else {
          $this->Category->query("INSERT INTO inventario.categories (category_id, category_description, category_level, category_parent_id) VALUES ('" .
                       $data['Category']['category_id'] . "', '" .
                       $data['Category']['category_description'] . "', '" .
                       $data['Category']['category_level'] . "', '" .
                       $data['Category']['category_parent_id'] . "');");
          $this->Session->setFlash(__('Action has been reversed and the category has been added to the inventory.'));
        }
      break;
    }

    if($this->Session->read('Memento.counter') == 0) $this->Session->delete('Memento.counter');
    $this->Session->delete($memento);
    return $this->redirect(array('action' => 'index'));
  }
}
