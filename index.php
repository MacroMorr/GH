<?php
include 'function.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Grin House Test</title>
</head>
<body>
<div class="container w-100">
    <div class="row">
        <div class="form-control mt-3 mb-3">
            <div class="text-center mt-2 mb-3 ">Дробные данные водятся через точку (пример: 1.1|1.4|1.8)</div>
            <form action="" method="post">
                <div class="form-group mt-2">
                    <label class="w-100">Клапан полива
                        <input type="text" class="form-control" name="valve_watering"
                               placeholder="Введите номер клапана полива">
                    </label>
                </div>

                <div class="form-group mt-2">
                    <label class="w-100">Объём
                        <input type="text" class="form-control" name="volume" placeholder="Введите объём">
                    </label>
                </div>
                <div class="form-group">
                    <label class="w-100">EC
                        <input type="text" class="form-control" name="EC" placeholder="Введите EC">
                    </label>
                </div>
                <div class="form-group">
                    <label class="w-100">pH
                        <input type="text" class="form-control" name="pH" placeholder="Введите pH">
                    </label>
                </div>

                <div class="form-group">
                    <label>Отделение
                        <select name="department" id="department" class="w-75">
                            <?php foreach ($department as $name) { ?>
                                <option value="<?= $name->name ?>"><?= $name->name ?></option>
                            <?php } ?>
                        </select>
                    </label>
                    <label>Тип
                        <select name="type" id="department" class="w-100">
                            <?php foreach ($typeName as $type) { ?>
                                <option value="<?= $type->name ?>"><?= $type->name ?></option>
                            <?php } ?>
                        </select>
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" name="close">Сбросить</button>
                    <button type="submit" class="btn btn-primary" name="add">Сохранить</button>
                </div>
            </form>
        </div>
        <div class="col-12">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Тип</th>
                    <th>Отделение</th>
                    <th>№ Клапана полива</th>
                    <th>Объём</th>
                    <th>ЕС</th>
                    <th>pH</th>
                    <th>+/-</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($sampleAll

                as $sample) { ?>
                <tr>
                    <td><?= $sample->name ?></td>
                    <td class="text-center"><?= $sample->department ?></td>
                    <td class="text-center"><?= $sample->valve_watering ?></td>
                    <td class="text-center"><?= $sample->volume ?></td>
                    <td class="text-center"><?= $sample->EC ?></td>
                    <td class="text-center"><?= $sample->pH ?></td>
                    <td>
                        <a href="?id=<?= $sample->id ?>" class="btn btn-primary btn-sm"
                           data-target="#edit<?= $sample->id ?>"
                           data-toggle="modal"><i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" data-target="#delete<?= $sample->id ?>"
                           data-toggle="modal">
                            <i class="fa fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                <!-- Modal edit -->
                <div class="modal fade" id="edit<?= $sample->id ?>" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Редактировать данные</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="?id=<?= $sample->id ?>" method="post">
                                    <div class="container">
                                        <div class="form-group mt-2">
                                            <label class="w-100">Клапан полива
                                                <input value="<?= $sample->valve_watering ?>" type="text"
                                                       class="form-control" name="valve_watering"
                                                       placeholder="Введите номер клапана полива">
                                            </label>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label class="w-100">Объём
                                                <input value="<?= $sample->volume ?>" type="text"
                                                       class="form-control"
                                                       name="volume" placeholder="Введите объём">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="w-100">EC
                                                <input value="<?= $sample->EC ?>" type="text" class="form-control"
                                                       name="EC"
                                                       placeholder="Введите EC">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="w-100">pH
                                                <input value="<?= $sample->pH ?>" type="text" class="form-control"
                                                       name="pH"
                                                       placeholder="Введите pH">
                                            </label>
                                        </div>

                                        <h5>Тип: <?= $sample->name ?></h5>
                                        <h5>Отеделние: <?= $sample->department ?></h5>

                                        <div class="form-group">
                                            <label>Изменить отделение
                                                <select name="department" id="department" class="w-75">
                                                    <?php foreach ($department as $name) { ?>
                                                        <option value="<?= $name->name ?>"><?= $name->name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </label>
                                            <label>Изменить тип
                                                <select name="type" id="department" class="w-100">
                                                    <?php foreach ($typeName as $type) { ?>
                                                        <option value="<?= $type->name ?>"><?= $type->name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                            <button type="submit" class="btn btn-primary" name="edit">
                                                Редактировать
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal edit end -->

                <!-- Modal delete edit -->
                <div class="modal fade" id="delete<?= $sample->id ?>"
                " tabindex="-1" role="dialog"
                aria-labelledby="delete" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Удалить запись №<?= $sample->id ?></h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="?id=<?= $sample->id ?>" method="post">
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                    <button type="submit" class="btn btn-danger" name="delete">
                                        Удалить
                                    </button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <!-- Modal delete end -->
    <?php } ?>
    </tbody>
    </table>
        <div>
            <a href="generatePDF.php" class="btn btn-success w-25 mt-3 mb-5 " target="_blank">Скачать PDF</a>
        </div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>