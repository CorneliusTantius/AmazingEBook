<?php

namespace Database\Seeders;

use App\Models\Ebook;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Gender::insert([
            ['gender_id' => 1, 'gender_desc' => 'male'],
            ['gender_id' => 2, 'gender_desc' => 'female']
        ]);
        Role::insert([
            ['role_id' => 1, 'role_desc' => 'admin'],
            ['role_id' => 2, 'role_desc' => 'user']
        ]);

        Ebook::insert([
            ['title' => 'Algorithms for Decision Making', 'author' => 'Mykel Kochenderfer, Tim Wheeler, and Kyle Wray', 'description' => 'This book provides a broad introduction to algorithms for decision making under uncertainty. It covers a wide variety of topics related to decision making, introducing the underlying mathematical problem formulations and the algorithms for solving them. Figures, examples, and exercises are provided to convey the intuition behind the various approaches.'],
            ['title' => 'On the Path to AI: Conceptual Foundations of the Machine Learning Age', 'author' => 'Thomas D. Grant, Damon J. Wischik', 'description' => 'This book explores machine learning and its impact on how we make sense of the world. It does so by bringing together two revolutions in a surprising analogy: the revolution of machine learning, which has placed computing on the path to artificial intelligence, and the revolution in thinking about the law that was spurred by Oliver Wendell Holmes Jr in the last two decades of the 19th century. Holmes reconceived law as prophecy based on experience, prefiguring the buzzwords of the machine learning age - prediction based on datasets.'],
            ['title' => 'Fundamentals of Programming C++', 'author' => 'Richard L. Halterman', 'description' => 'This book teaches the basics of C++ programming in an easy-to-follow style, without assuming previous experience in any other language. A variety of examples such as game programming, club membership organization, grade tracking and grade point average calculation, make learning C++ both fun and practical. Each chapter contains at least one complete, fully functional example program, with several smaller examples provided throughout the book.'],
            ['title' => 'Data Structures and Algorithm Analysis in C++, Third Edition', 'author' => 'Clifford A. Shaffer', 'description' => 'A comprehensive treatment focusing on the creation of efficient data structures and algorithms, this text explains how to select or design the data structure best suited to specific problems. It uses C++ as the programming language and is suitable for second-year data structure courses and computer science courses in algorithmic analysis.'],
            ['title' => 'Elements of Programming', 'author' => 'Alexander Stepanov and Paul McJones', 'description' => 'This book provides a different understanding of programming than is presented elsewhere. Its major premise is that practical programming, like other areas of science and engineering, must be based on a solid mathematical foundation. The book shows that algorithms implemented in a real programming language, such as C++, can operate in the most general mathematical setting. For example, the fast exponentiation algorithm is defined to work with any associative operation. Using abstract algorithms leads to efficient, reliable, secure, and economical software.'],
            ['title' => 'C++ Essentials', 'author' => 'Sharam Hekmat', 'description' => 'This book introduces C++ as an object-oriented programming language. No previous knowledge of C or any other programming language is assumed. It presents the basics of C++ in the context of procedural, generic, object-based, and object-oriented programming. It is organized around a series of increasingly complex programming problems, and language features are introduced as solutions to these problems. In this way you will not only learn about the functions and structure of C++, but will understand their purpose and rationale.'],
            ['title' => 'The Boost C++ Libraries', 'author' => 'Boris Schaling', 'description' => 'This book is an introduction to the Boost C++ Libraries. The Boost C++ Libraries complement the C++ standard and add many practical tools that can be of use to any C++ developer and in any C++ project. Because the Boost C++ Libraries are based on the C++ standard, they are implemented using state-of-the-art C++. They are platform independent and are supported on many operating systems, including Windows and Linux, by a large developer community.'],
            ['title' => 'Fundamentals of Computer Programming with C#', 'author' => 'Svetlin Nakov, et al', 'description' => 'This book is a comprehensive computer programming tutorial that teaches programming, logical thinking, data structures and algorithms, problem solving and high quality code with lots of examples in C#. It starts with the first steps in programming and software development like variables, data types, conditional statements, loops and arrays and continues with other basic topics like methods, numeral systems, strings and string processing, exceptions, classes and objects.'],
            ['title' => 'Guide to NoSQL with Azure Cosmos DB: Create Scalable and Globally Distributed Web Applications', 'author' => 'Gaston C. Hillar, Daron Yondem', 'description' => 'Cosmos DB is a NoSQL database service included in Azure that is continuously adding new features and has quickly become one of the most innovative services found in Azure, targeting mission-critical applications at a global scale.']
        ]);
    }
}
