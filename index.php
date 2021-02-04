<?php


if(1){


    $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 100);
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $bulk = new MongoDB\Driver\BulkWrite;


    // INSERT
 $bulk->insert(['_id' => 1,'name'=>"Katy",'age'=>27]);
 $bulk->insert(['_id' => 2,'name'=>"Vova",'age'=>27]);
 $bulk->insert(['_id' => 3,'name'=>"Kolya",'age'=>44]);
 $bulk->insert(['_id' => 4,'name'=>"Del",'age'=>44]);



// UPDATE
    $bulk->update(['_id' => 1], ['$set' => ['name' => "Katy2"]], ['multi' => false, 'upsert' => false]);
    $bulk->update(['_id' => 2], ['$set' => ['name' => "Vova2"]], ['multi' => false, 'upsert' => true]);
    $bulk->update(['_id' => 3], ['$set' => ['name' => "Kolya2"]], ['multi' => false, 'upsert' => true]);

// DELETE
    $bulk->delete(['_id' => 4], ['limit' => 1]);

// EXECUTE
    $result = $manager->executeBulkWrite('test32.first', $bulk, $writeConcern);



    printf("Inserted %d document(s)\n", $result->getInsertedCount());
    printf("Matched  %d document(s)\n", $result->getMatchedCount());
    printf("Updated  %d document(s)\n", $result->getModifiedCount());
    printf("Upserted %d document(s)\n", $result->getUpsertedCount());
    printf("Deleted  %d document(s)\n", $result->getDeletedCount());

    foreach ($result->getUpsertedIds() as $index => $id) {
        printf('upsertedId[%d]: ', $index);
        var_dump($id);
    }

// If the WriteConcern could not be fulfilled
    if ($writeConcernError = $result->getWriteConcernError()) {
        printf("%s (%d): %s\n", $writeConcernError->getMessage(), $writeConcernError->getCode(), var_export($writeConcernError->getInfo(), true));
    }

// If a write could not happen at all
    foreach ($result->getWriteErrors() as $writeError) {
        printf("Operation#%d: %s (%d)\n", $writeError->getIndex(), $writeError->getMessage(), $writeError->getCode());
    }





}




// SHOW Query
$filter = ['age' => ['$gt' => 27]];
$options = [
    'projection' => ['_id' => 0,'name'=>1],// projection => Только возвращать следующие поля в согласующих документов
    'sort' => ['age' => -1],
    "modifiers" => array(
        '$comment'   => "This is a query comment",
        '$maxTimeMS' => 100,
    ),
];

$query = new MongoDB\Driver\Query($filter, $options);
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$cursor = $manager->executeQuery('test32.first', $query);

foreach ($cursor as $document) {
    var_dump($document);
}
/*
MongoDB\Driver\Query::options

awaitData	      bool	   Блок, а не не возвращая никаких данных. После периода, тайм-аут. Полезно для tailable курсора
batchSize	      integer  Количество документов, возвращаемых на партию
exhaust           bool	   Поток данных вниз полную мощность в нескольких "ответ" пакетов. Быстрее, когда вы тянете вниз много данных, и вы знаете, что вы хотите получить все
limit	          integer  Количество документов, которые должны быть возвращены
modifiers	      array    Мета-операторы, изменяющие вывод или поведение запроса (https://docs.mongodb.org/manual/reference/method/js-cursor/#modifiers)
noCursorTimeout	  bool	   Не таймаут курсор, который бездействовал в течение более 10 минут
oplogReplay	      bool	   Флаг внутреннего сервера MongoDB
partial	          bool	   Получить частичные результаты из MongoDB, если некоторые осколки вниз (вместо того, чтобы бросать ошибку)
projection	      array|object	Задает поля для возврата с помощью boolean или проекционные операторы
readConcern	      MongoDB\Driver\ReadConcern	Уровень изоляции для выполнения запросов наборов реплик и наборов репликации черепки. Этот вариант требует механизм хранения WiredTiger и MongoDB 3.2 или более поздней версии.
skip	          integer  Количество документов, пропускаемых перед возвращением
slaveOk	          bool	   Разрешить запрос из набора реплик второстепенных маховых
sort	          array|object	Порядок, в котором возвращать соответствующие документы
tailable	      bool	   Курсор не будет закрыт, когда последние данные извлекаются. Вы можете возобновить этот курсор позже
*/

exit;
$Manager = new \MongoDB\Driver\Manager();
$mongoClient =    $Manager->selectDatabase('test32'); // подключение к базе
$this->collection = $mongoClient->selectCollection('second'); // подключение к коллекции


// selectDatabase
 $options = [];
 $options['typeMap'] = ['root' => 'array', 'document' => 'array'] ;
new Database($Manager, "test32", $options);


// Collection create
    $options = [];
    $options['typeMap'] = ['root' => 'array', 'document' => 'array'] ;
    /** @var  $manager  \MongoDB\Driver\Manager */
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $Collection= new Collection($manager, 'test32', 'second', $options);


// DropDatabase
    $options['typeMap'] = ['root' => 'array', 'document' => 'array'] ;
    $server = $manager->selectServer(new  \MongoDB\Driver\ReadPreference(ReadPreference::RP_PRIMARY));
    $cursor = $server->executeCommand("test32", new \MongoDB\Driver\Command(['dropDatabase' => 1]));
    $cursor->setTypeMap($options['typeMap']);
    return  current($cursor->toArray() );
