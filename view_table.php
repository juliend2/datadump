<?php require_once './lib/db.php'; ?>
<?php include './inc/header.php'; ?>
<div id="container"></div>
<script>
<?php $tablename = $_GET['table']; ?>
var tableColumns = <?php echo json_encode($db->get_fields($tablename)); ?>;
var tableRows = <?php echo json_encode($db->get_values($tablename)); ?>;

$(function(){
  Mousetrap.bind(['ctrl+c','command+c'], function(){
    var copyEvent = new Event('copy');
    window.dispatchEvent(copyEvent);
  });
  ReactDOM.render(React.createElement(window.Table, {
    tableName: '<?php echo $tablename ?>',
    tableRows: tableRows,
    tableColumns: tableColumns,
    isView: false
  }), document.getElementById('container'));
});
</script>
<?php include './inc/footer.php'; ?>
