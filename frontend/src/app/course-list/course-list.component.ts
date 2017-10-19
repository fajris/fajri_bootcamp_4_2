import { Component, OnInit } from '@angular/core';
import { DataService } from "../data.service";

@Component({
  selector: 'app-course-list',
  templateUrl: './course-list.component.html',
  styleUrls: ['./course-list.component.css']
})
export class CourseListComponent implements OnInit {

  constructor(private data: DataService) { }

  ngOnInit() {
  }

  GetCourse(): object[] {
    var CourseList: object[] = [];
    for (var i = 0; i < this.data.CourseList.length; i++) {
      var course = this.data.CourseList[i];
      CourseList.push(course);
    }
    return CourseList;
  }

}
