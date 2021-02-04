<?php
 namespace MongoDB;
 /*
 echo phpversion();
 $con = new \MongoClient('mongodb://localhost:27017');
 $db=$con->selectDB('test32');
 $collection = $db->selectCollection("first");

 $res=$collection->find([])->getNext();
 print_r([$res]);exit;
*/
/////////////////////////////////////////////////////////////

//include 'autoload.php';
   include 'mongo-php-library-master\src\Client.php';

$connectOptions['uri'] = 'mongodb://127.0.0.1:27017';
$connectOptions['uriOptions'] = [];
$connectOptions['driverOptions'] = ['typeMap' => ['root' => 'array', 'document' => 'array']];
$connectOptions['nameDatabase']='test32';
//$this->manager = new MongoDB\Driver\Manager($uri, $uriOptions, $driverOptions);

$Client= new  \MongoDB\Client($connectOptions['uri'],  [], $connectOptions['driverOptions']);// аналогично   Yii::$app->mongodb

$mongoClient =  $Client->selectDatabase('test32'); // подключение к базе
/** @var  $collection */
$collection = $mongoClient->selectCollection('first'); // подключение к коллекции


// INSERT  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(0){

    $obj=[];
    $book=[];
    $book['_id']=70;
    $book['book']="Музыкальные шедевры. Природа и музыка. Допущено Министерством образования и науки РФ";
    $book['authors']=[
        0=>["author_id"=>67,"author"=>"Радынова О.П.","uri"=>"http://www.booka.ru/search?q=%D0%A0%D0%B0%D0%B4%D1%8B%D0%BD%D0%BE%D0%B2%D0%B0%20%D0%9E.%D0%9F. st=author","domain"=>"booka.ru"],
        1=>["author_id"=>68,"author"=>"Патриот R.T.","uri"=>"http://www.booka.ru/search?q=%D0%A0%D0%B0%D0%B4%D1%8B%D0%BD%D0%BE%D0%B2%D0%B0%20%D0%9E.%D0%9F. st=author","domain"=>"booka.ru"]
    ] ;
    $book['categories']=["category_id"=>25,"category"=> "Музыка. Нотные издания","domain"=> "booka.ru", "parent_id"=> 0, "level"=>1, "_id_parent"=> 0, "category_parent"=> null] ;
    $book['seria']= "Музыкальные шедевры";
    $book['contents']= "";
    $book['protagonist']= "";
    $book['age']= 10;
    $book['main_img']= "http://www.booka.ru/images/absence_big.gif";
    $book['status']=2 ;
    $book['create_time']= time();
    $book['update_time']= null;
    $book['seo_title']= "";
    $book['seo_description']= "";
    $book['seo_keyword']= "";
    $book['seo_book']= "muzykalnye-shedevry-priroda-i-muzyka-dopushcheno-ministerstvom-obrazovaniya-i-nauki-rf";
    $obj[]=$book;



    $book=[];
    $book['_id']=71;
    $book['book']="Интересная книга";
    $book['authors']=[
        0=>["author_id"=>60,"author"=>"Рылкин П.","uri"=>"http://www.booka.ru/search?q=%D0%A0%D0%B0%D0%B4%D1%8B%D0%BD%D0%BE%D0%B2%D0%B0%20%D0%9E.%D0%9F. st=author","domain"=>"booka.ru"],
    ] ;
    $book['categories']=["category_id"=>20,"category"=> "Интересное","domain"=> "booka.ru", "parent_id"=> 0, "level"=>1, "_id_parent"=> 0, "category_parent"=> null] ;
    $book['seria']= "Интерес";
    $book['contents']= "";
    $book['protagonist']= "";
    $book['age']= 12;
    $book['main_img']= "http://www.booka.ru/images/absence_big.gif";
    $book['status']=2 ;
    $book['create_time']= time();
    $book['update_time']= null;
    $book['seo_title']= "";
    $book['seo_description']= "";
    $book['seo_keyword']= "";
    $book['seo_book']= "muzykalnye-shedevry-priroda-i-muzyka-dopushcheno-ministerstvom-obrazovaniya-i-nauki-rf";
    $obj[]=$book;


    $book=[];
    $book['_id']=73;
    $book['book']="Для роботостроения";
    $book['authors']=[
        0=>["author_id"=>60,"author"=>"Рылкин П.","uri"=>"http://www.booka.ru/search?q=%D0%A0%D0%B0%D0%B4%D1%8B%D0%BD%D0%BE%D0%B2%D0%B0%20%D0%9E.%D0%9F. st=author","domain"=>"booka.ru"],
    ] ;
    $book['categories']=["category_id"=>20,"category"=> "Интересное","domain"=> "booka.ru", "parent_id"=> 0, "level"=>1, "_id_parent"=> 0, "category_parent"=> null] ;
    $book['seria']= "Интерес";
    $book['contents']= "";
    $book['protagonist']= "";
    $book['age']= 12;
    $book['main_img']= "http://www.booka.ru/images/absence_big.gif";
    $book['status']=3 ;
    $book['create_time']= time();
    $book['update_time']= null;
    $book['seo_title']= "";
    $book['seo_description']= "";
    $book['seo_keyword']= "";
    $book['seo_book']= "muzykalnye-shedevry-priroda-i-muzyka-dopushcheno-ministerstvom-obrazovaniya-i-nauki-rf";
    $obj[]=$book;

  //  $collection->insertOne($obj[0]);
  //  $collection->insertOne($obj[1]);
    /** @var  $result MongoDB\Driver\WriteResult */
  $result=   $collection->insertOne($obj[2]);
    echo $result['nInserted'];
// $collection->insertMany($obj);
print_r($result);

  exit;
}





// UPDATE /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(0){


// $collection->findOneAndDelete(['_id'=>71]);

/** @var  $result MongoDB\Driver\WriteResult */
   $result= $collection->updateOne(['_id' => 70],['$set' => ['book' => "new book",'seria' => "new seria"]]);
    print_r($result);
/*
            [nInserted] => 0
            [nMatched] => 1
            [nModified] => 0
            [nRemoved] => 0
            [nUpserted] => 0
            [upsertedIds] => Array()
            [writeErrors] => Array()
            [writeConcernError] =>
            [writeConcern] => Array
                (   [w] =>
                    [wmajority] =>
                    [wtimeout] => 0
                    [journal] =>
                )
        )
 */
}




// DELETE /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(0){

    $filter = ['_id' => 73];
    $options = ['justOne' => true];
  $result =   $collection->deleteOne($filter,$options);
    echo $result['nRemoved'];
}



// FIND  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(0){


    $filter = ['_id' => ['$gt' => 27]];
    $options = [
        'projection' => ['_id' => 0,'main_img'=>1],// projection => Только возвращать следующие поля в согласующих документов
        'sort' => ['_id' => -1],
        'limit' => 5,
        'skip' => 0,
        "modifiers" => array(
            '$comment'   => "This is a query comment",
            '$maxTimeMS' => 100,
        ),
    ];
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



    /** @var  $cursor \MongoDB\Cursor */
  /*  $cursor = $collection->find($filter,$options);// findOne
    $arr=iterator_to_array($cursor);
    for($i=0;$i<count($arr);$i++){
        foreach($arr[$i] as $k=>$v){
            echo $k,"\n";
            print_r($v);
        }
    }
*/

    /*
    $it = new \IteratorIterator($cursor);
    $it->rewind(); // Very important

    while($doc = $it->current()) {
        var_dump($doc);
        $it->next();
    }
    */


    $obj=$collection->findOne($filter,$options);
  print_r($obj['main_img']);



// размер выборки  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //  echo $collection->count($filter,$options);




// aggregate /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // http://mongodb.github.io/mongo-php-library/tutorial/crud/#aggregation
    $collection = (new \MongoDB\Client)->test32->first;
    /*$cursor = $collection->aggregate([

        ['$group' => ['_id' => '$state', 'count' => ['$sum' => 1]]],
        ['$sort' => ['count' => -1]],
        ['$limit' => 5],
    ]);*/


    /// группируем по полю age ('$group' => ['_id' => '$age'] ) где _id не означает id документа ,а уникальный результат группировки ,а $age это поле age документа
    // при группировке одновременно подсчитываем сумму по полю status ('status' => ['$sum' => '$status'])
    // или можно просто по наличию тогда ('status' => ['$sum' => 1 ])
    /*$cursor = $collection->aggregate([
        ['$group' => ['_id' => '$age', 'status' => ['$sum' => '$status']]],
        ['$sort' => ['status' => -1]],
        ['$limit' => 5],
    ]);*/

// https://docs.mongodb.org/manual/reference/operator/aggregation/redact/#pipe._S_redact
    $cursor = $collection->aggregate([
        // [ '$match' =>['_id' => ['$gt' => 69]]  ],
      //  ['$match' => ['seria' => "Интерес"]  ],
        ['$match' => ['seria'=>['$regex'=>  '^.*$'  ]]],
        ['$group' =>['_id' => '$age', 'status' => ['$sum' => '$status']]],
        ['$sort' =>['status' => -1]],
        ['$limit' => 5],
    ]);




    foreach ($cursor as $state) {
     //  print_r($state);
    }



}

