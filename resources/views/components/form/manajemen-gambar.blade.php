<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    Manajemen Gambar
    <ul class="drag-sort-enable">
        <li class="item-drag">Application</li>
        <li class="item-drag">Blank</li>
        <li class="item-drag">Class</li>
        <li class="item-drag">Data</li>
        <li class="item-drag">Element</li>
    </ul>
</div>
@push('styles')
<style>
ul.drag-sort-enable {
    margin: 0;
    padding: 0;
}

.item-drag {
    margin: 5px 0;
    padding: 0 20px;
    height: 40px;
    line-height: 40px;
    border-radius: 3px;
    background: #e52d27;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #b31217, #e52d27);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #b31217, #e52d27); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    color: #fff;
    list-style: none;
    cursor: pointer;
}

li.drag-sort-active {
    background: transparent;
    color: transparent;
    border: 1px solid #4ca1af;
}

span.drag-sort-active {
    background: transparent;
    color: transparent;
}
</style>
@endpush
@push('scripts')
<script>
function enableDragSort(listClass) {
  const sortableLists = document.getElementsByClassName(listClass);
  Array.prototype.map.call(sortableLists, (list) => {enableDragList(list)});
}

function enableDragList(list) {
  Array.prototype.map.call(list.children, (item) => {enableDragItem(item)});
}

function enableDragItem(item) {
  item.setAttribute('draggable', true)
  item.ondrag = handleDrag;
  item.ondragend = handleDrop;
}

function handleDrag(item) {
  const selectedItem = item.target,
        list = selectedItem.parentNode,
        x = event.clientX,
        y = event.clientY;

  selectedItem.classList.add('drag-sort-active');
  let swapItem = document.elementFromPoint(x, y) === null ? selectedItem : document.elementFromPoint(x, y);

  if (list === swapItem.parentNode) {
    swapItem = swapItem !== selectedItem.nextSibling ? swapItem : swapItem.nextSibling;
    list.insertBefore(selectedItem, swapItem);
  }
}

function handleDrop(item) {
  item.target.classList.remove('drag-sort-active');
}

(()=> {enableDragSort('drag-sort-enable')})();
</script>
@endpush
