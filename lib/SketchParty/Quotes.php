<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/24/2016
 * Time: 11:11 PM
 */

namespace SketchParty;


class Quotes extends Table {

    public function __construct(Site $site) {
        parent::__construct($site, "quote");
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

        return new Quote($statement->fetch(\PDO::FETCH_ASSOC));
    }

    public function add(Quote $quote) {
        $sql = <<<SQL
insert into $this->tableName(source, quote)
values(?, ?)
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($quote->getSource(), $quote->getQuote()));

        return $this->pdo()->lastInsertId();
    }

    public function getRandom($count = 3) {
        $sql = <<<SQL
select id from $this->tableName
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array());
        if($statement->rowCount() === 0) {
            return null;
        }

        $ids = $statement->fetchall(\PDO::FETCH_ASSOC);
        $quotes = array();
        $used = array();
        for($i=0; $i<$count; $i++) {
            while(in_array($idx = rand(0,count($ids)-1), $used));
            $used[] = $idx;
            $quotes[] = $this->get($ids[$idx]['id']);
        }
        return $quotes;
    }
}