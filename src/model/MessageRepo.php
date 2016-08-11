<?php

class MessageRepo extends DbAssist {

    public function getAll($approved = false)
    {
        $query = 'select * from message';
        if ($approved) {
            $query.=' where approved = 1';
        }

        $query.= ' ORDER BY added DESC';

        return $this->query($query);
    }

    public function add($name, $email, $text, $picture)
    {
        $query = sprintf(
            'INSERT INTO message (name, email, text, picture, added) values ("%s", "%s", "%s", "%s", NOW())',
            $this->safe($name),
            $this->safe($email),
            $this->safe($text),
            $picture
        );

        return $this->query($query);
    }

    public function update($id, $text)
    {
        $id = $this->safe($id);
        $text = $this->safe($text);
        $query = "UPDATE message SET text='$text', modified='1' WHERE id='$id'";

        return $this->query($query);
    }

    public function approve($id)
    {
        $id = $this->safe($id);
        $query = "UPDATE message SET approved='1' WHERE id='$id'";

        return $this->query($query);
    }

    public function disapprove($id)
    {
        $id = $this->safe($id);
        $query = "UPDATE message SET approved='2' WHERE id='$id'";

        return $this->query($query);
    }

    public function find($id)
    {
        $id = $this->safe($id);
        $query = "SELECT 1 from message where id='$id'";

        return $this->query($query);
    }
}