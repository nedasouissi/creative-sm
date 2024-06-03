        +-------------------+        +-------------------+        +-------------------+
        |       Users       |        |      teacher     |        |      Teachers     |
        +-------------------+        +-------------------+        +-------------------+
        | user_id (PK)      |        | student_id (PK)    |        | teacher_id (PK)   |
        | username          |<-------| user_id (FK)      |------->| user_id (FK)      |
        | password
            cin             |        | first_name        |        | first_name        |
        | email             |        | last_name         |        | last_name         |
        | role              |        |           |        | subject           |
        | status            |        +-------------------+        +-------------------+
        | is_active         |
        | access_level      |
        +-------------------+

              |
              |         +---------------------+        +-----------------------+
              |         |       Classes       |        |  Classroom Schedules |
              |         +---------------------+        +-----------------------+
              |         | class_id (PK)       |        | schedule_id (PK)      |
              +-------->| class_name           |<-------| class_id (FK)         |
                        | teacher_id (FK)      |        | day                   |
                        | schedule             |        | start_time            |
                        +---------------------+        | end_time              |
                                                       +-----------------------+

              |
              |         +---------------------+        +-----------------------+
              |         |     Assignments     |        | Homework Submissions  |
              |         +---------------------+        +-----------------------+
              |         | assignment_id (PK)  |        | submission_id (PK)    |
              +-------->| title               |<-------| assignment_id (FK)    |
                        | description         |        | parent_id (FK)        |
                        | class_id (FK)       |        | child_name            |
                        | due_date            |        | file_path             |
                        +---------------------+        | submitted_at          |
                                                       | grade                 |
                                                       | feedback              |
                                                       +-----------------------+

              |
              |         +---------------------+
              |         |     Announcements   |
              |         +---------------------+
              |         | announcement_id (PK)|
              +-------->| title               |
                        | content             |
                        | user_id (FK)        |
                        | target_audience     |
                        +---------------------+

              |
              |         +---------------------+
              |         |       Materials     |
              |         +---------------------+
              |         | material_id (PK)    |
              +-------->| title               |
                        | description         |
                        | file_path           |
                        | class_id (FK)       |
                        | teacher_id (FK)     |
                        +---------------------+

              |
              |         +---------------------+
              |         |        Grades       |
              |         +---------------------+
              |         | grade_id (PK)       |
              +-------->| parent_id (FK)      |
                        | child_name          |
                        | class_id (FK)       |
                        | grade               |
                        +---------------------+

              |
              |         +---------------------+
              |         |      Statistics     |
              |         +---------------------+
                        | statistics_id (PK)  |
                        | total_students     |
                        | total_teachers     |
                        | total_parents      |
                        | total_classes      |
                        +---------------------+
