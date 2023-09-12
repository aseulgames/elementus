const unlockedColumns = new Set();

        function unlockColumn(column, columnNumber) {
            if (!unlockedColumns.has(columnNumber)) {
                // Unlock the clicked column
                column.classList.add('unlocked');
                unlockedColumns.add(columnNumber);
            }
        }