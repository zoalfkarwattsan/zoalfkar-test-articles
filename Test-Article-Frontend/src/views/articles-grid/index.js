import React, {useEffect, useState} from 'react'
import {Link} from 'react-router-dom'
import {_getArticles} from "../../redux/actions/auth/index"
import {Button, Card, CardBody, CardHeader, Col, Container, Row} from "reactstrap"
import AddModal from "./add-modal"
import {Plus} from "react-feather"

function ArticleList() {
  const [articles, setArticles] = useState([])
  const [selectedArticleModal, setSelectedArticleModal] = useState({data: null, show: false})

  const refreshData = () => {
    _getArticles(
      (res) => {
        // console.log(res.data.data.articles-grid)
        setArticles(res.data.data.Articles)
      }
    )

  }

  useEffect(() => {
    refreshData()
  }, [])

  return (
    <>
      <Container fluid={true}>
        <Row>
          <Col className={'d-flex justify-content-between align-items-center'}>
            <h2>Articles</h2>
            <Button color={'primary'} className={'btn-icon'} onClick={() => { setSelectedArticleModal({data: null, show: true}) }} >
              <Plus />
            </Button>
          </Col>
        </Row>
        <Row className={"match-height"}>
          {articles.map(article => (
            <Col xs={12} key={article.id} sm={6} md={4} xl={3}>
              <Card>
                <CardHeader>
                  {article.title}
                </CardHeader>
                <CardBody>
                  <h3><Link to={`/articles/${article.id}`}>{article.title}</Link></h3>
                  <p>{new Date(article.created_at).toLocaleDateString()}</p>
                  <p>{article.content.slice(0, 50)}...</p>
                </CardBody>
              </Card>
            </Col>
          ))}
        </Row>
      </Container>
      {
        selectedArticleModal.show ? <AddModal onClose={() => setSelectedArticleModal({show: false, data: null})} onSuccessCallback={refreshData} /> : null
      }
    </>
  )
}

export default ArticleList
