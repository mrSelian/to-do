<?php
namespace App;
class ToDo
{
    protected string $id;
    protected string $title;
    protected string $text;
    protected string $creationDate;
    protected string $deadlineDate;
    protected string $startDate;
    protected string $endDate;
    protected string $status;
    protected bool $completed;

    public function __construct(array $post)
    {
        $this->id = $post['id'];
        $this->title = $post['title'];
        $this->text = $post['text'];
        $this->creationDate = $post['creation_date'];
        $this->deadlineDate = $post['deadline_date'];
        $this->startDate = $post['start_date'];
        $this->endDate = $post['end_date'];
        $this->status = $post['status'];
        $this->completed= $post['completed'];
    }

    public function completable()
    {
        if ($this->endDate == '' ) return true;
        die ('Эта задача уже выполнена');
    }

    public function deletable()
    {
        if($this->status != 'Ожидает Подтверждения') return true;
        die('Невозможно удалить завершенную, но неподтвержденную задачу.');
    }

    public function verifiable()
    {
        if($this->status != 'Ожидает Подтверждения') die('Подтвердить можно только задачи в статусе "Ожидает Подтверждения"');
        return true;
    }


}

