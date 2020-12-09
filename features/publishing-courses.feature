@wip
Feature: Publishing courses

  Courses exist first as a draft, and then are published to the public schedule

#  Rule: Initially courses aren't public

      Example: Making a non-public course
        When I schedule "BDD for Dummies"
        Then "BDD for Dummies" should be on the draft schedule
        But "BDD for Dummies" should not be on the public schedule

#  Rule: Trainers must be attached to a course to make it public

      Example: Assigning a trainer and publishing the course
        Given I have scheduled "BDD for Dummies"
        And I have assigned the trainer "Ciaran McNulty" to "BDD for Dummies"
        When I publish "BDD for Dummies"
        Then "BDD for Dummies" should be on the public schedule

      Example: Trying to publish with no trainer
        Given I have scheduled "BDD for Dummies"
        And but I have not assigned a trainer to "BDD for Dummies"
        When I try to publish "BDD for Dummies"
        Then "BDD for Dummies" should not be on the public schedule