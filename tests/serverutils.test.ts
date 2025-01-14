import {describe, expect, test} from '@jest/globals';

import * as utils from "./../server/utils"

// You see, this is what happens when you realize I half-ass (pardon my language) my original code,
// And nobody actually catches the actual issue for a whole damn year
// - Roberto :D
describe("Number Suffix Algorithm", () => {
  test("Suffix of 1", () => {expect(utils.NumberSuffix(1)).toBe("1st")});
  test("Suffix of 2", () => {expect(utils.NumberSuffix(2)).toBe("2nd")});
  test("Suffix of 3", () => {expect(utils.NumberSuffix(3)).toBe("3rd")});
  
  for (let i: number = 4; i <= 20; i++) {
    test(`Suffix of ${i}`, () => {expect(utils.NumberSuffix(i)).toBe(`${i}th`)});
  }; 

  test("Suffix of 21", () => {expect(utils.NumberSuffix(21)).toBe("21st")});
  test("Suffix of 22", () => {expect(utils.NumberSuffix(22)).toBe("22nd")});
  test("Suffix of 23", () => {expect(utils.NumberSuffix(23)).toBe("23rd")});

  for (let i: number = 24; i <= 30; i++) {
    test(`Suffix of ${i}`, () => {expect(utils.NumberSuffix(i)).toBe(`${i}th`)});
  };
});

describe("The Meeting Date Backend", () => {
  var TestResult : string;

  test("1. No Scheduled Meeting", () => {
    expect(utils.GetMeetingDate(false)).toBe("TBA");
  });

  test("2. Scheduled Meeting", () => {
    TestResult = utils.GetMeetingDate(true);
    expect(TestResult).toBe("Aug 21st - 7:00 PM");
  });
});
