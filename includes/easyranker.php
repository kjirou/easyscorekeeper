<?php
/**
 * easyranker.php
 *
 * @php_version >= 5.3
 * @dependency PHP SQLite3 module <http://www.php.net/manual/en/book.sqlite3.php>
 * @licence MIT Licence <http://www.opensource.org/licenses/mit-license.php>
 * @author kjirou <sorenariblog[at]google[dot]com> <http://blog.kjirou.net/>
 */
class EasyRankerError extends Exception {}

class EasyRanker {

    const VERSION = '0.0.1';

    private $data_root = './data';
    private $db_filename = 'easyranker.db';
    private $db = null;
    private $params = array();

    public function execute() {

        $this->db = $this->initialize_db();

        #$this->apply_mode();
        #$this->apply_person_id();
        #$this->apply_jsonp_callback();

        #// データディレクトリが無ければ生成する
        #if (file_exists($this->data_dir) === false) {
        #    mkdir($this->data_dir); //! 第2引数に 0777 入れたけどダメだった、詳細不明
        #    chmod($this->data_dir, 0777);
        #}

        #// .htaccess自動生成オプション
        #if ($this->enable_auto_htaccess) {
        #    $htaccess_path = $this->data_dir . '/.htaccess';
        #    if (file_exists($htaccess_path) === false) {
        #        $fh = fopen($htaccess_path, 'w');
        #        fwrite($fh, "Order Deny,Allow\nDeny from All");
        #        fclose($fh);
        #        chmod($htaccess_path, 0777);
        #    }
        #}

        ##// データファイル削除処理, 数アクセスに1回実行する
        ##if ($this->gc_frequency !== null && rand(1, $this->gc_frequency) === 1) {
        ##    $this->clean_data_file();
        ##}

        #// エンドユーザによる誤った操作は EasyKVSNgResponseError を投げる
        #try {
        #    if ($this->person_id === null) {
        #        throw new EasyKVSNgResponseError("None `{$this->person_id_key}` in params");
        #    }
        #    if ($this->mode === 'fetch') {
        #        return $this->fetch();
        #    } else if ($this->mode === 'update') {
        #        return $this->update();
        #    } else if ($this->mode === 'remove') {
        #        return $this->remove();
        #    }
        #} catch (EasyKVSNgResponseError $err) {
        #    $this->output_response('ng', $err->getMessage());
        #    return;
        #}

        $this->db->close();
    }

    private function get_db_filepath() {
      return $this->data_root . '/' . $this->db_filename;
    }

    private function initialize_db() {
      return new SQLite3($this->get_db_filepath());
    }

    public function add_params($params) {
        $this->params = array_merge($this->params, $params);
    }

    static public function auto_start() {
        global $_GET, $_POST;
        $obj = new self();
        $obj->add_params($_GET);
        $obj->add_params($_POST);
        $obj->execute();
        return $obj;
    }
}
