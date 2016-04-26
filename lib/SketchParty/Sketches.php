<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/24/2016
 * Time: 8:08 PM
 */

namespace SketchParty;


class Sketches extends Table {

    public function __construct(Site $site) {
        parent::__construct($site, "sketch");
    }

    public function get($id) {
        $sql = <<<SQL
select * from $this->tableName
where id = ?
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($id));
        if($statement->rowCount() === 0) {
            return null;
        }

        return new Sketch($statement->fetch(\PDO::FETCH_ASSOC));
    }

    public function save(Sketch $sketch) {
        $sql = <<<SQL
insert into $this->tableName(title, image)
values(?, ?)
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($sketch->getTitle(), $sketch->getData()));

        return $this->pdo()->lastInsertId();
    }

    public function getRandom($count = 2) {
        $sql = <<<SQL
select id from $this->tableName
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array());
        if($statement->rowCount() === 0) {
            return null;
        }

        $ids = $statement->fetchall(\PDO::FETCH_ASSOC);
        $sketches = array();
        $used = array();
        for($i=0; $i<$count; $i++) {
            while(in_array($idx = rand(0,count($ids)-1), $used));
            $used[] = $idx;
            $sketches[] = $this->get($ids[$idx]['id']);
        }
        return $sketches;
    }
}